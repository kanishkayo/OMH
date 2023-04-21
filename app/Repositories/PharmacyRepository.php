<?php

namespace App\Repositories;

use App\Http\Requests\LoginRequest;
use App\Interfaces\DBPreperableInterface;
use App\Interfaces\UserInterface;
use App\InventoryItems;
use App\PatientInvoice;
use App\PatientOrder;
use App\PatientProfile;
use App\PharmacyProfile;
use App\PharmacyStock;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\PersonalAccessTokenResult;

class PharmacyRepository
{
    protected $model;

    public function __construct(PharmacyProfile $model)
    {
        $this->model = $model;
    }

    public function all(array $filterData)
    {
        $filter = $this->getFilterData($filterData);
        $query = $this->model::orderBy($filter['oderBy'], $filter['oder']);


        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('pharmacy_name', 'like', $searched)
                    ->orWhere('district', 'like', $searched);
            });
        }
        return $query->get();
    }

    public function searchPharmacyStock(array $filterData)
    {
        $filter = $this->getFilterData($filterData);
        $query = PharmacyStock::with('pharmacy')->orderBy($filter['oderBy'], $filter['oder']);


        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('inventory_item_name', 'like', $searched);

            });
        }
        return $query->get();
    }



    public function getOderList(array $data)
    {
        $pharmacy_id=$data['pharmacy_id'];

        $data =  PatientOrder::with('patient')
        ->where('pharmacy_id', '=', $pharmacy_id)
        ->orderBy('created_at', 'desc')
        ->get();

        if ($data->isEmpty()) {
            throw new Exception("Sorry, order does not avalabel, please try again.", 200);
        } else {
            return $data;
        }


    }

    public function getInvoice(array $data)
    {
        return PatientInvoice::with('patientInventory')
        ->where('patient_order_id', '=', $data['patient_order_id'])->first();
    }

    public function getOrderList(array $data)
    {
        return PatientOrder::with('patientinvoice','patient')
        ->where('oder_status', '=', $data['oder_status'])
        ->where('pharmacy_id','=',$data['pharmacy_id'])->get();
    }

    public function addPharmacyInventory(array $data)
    {
        $addedPhamacyItem = PharmacyStock::create($data);
        if (!$addedPhamacyItem) {
            return $addedPhamacyItem = "somthing wrong ...!";
        }
        return $addedPhamacyItem;
    }
    public function inventoryItemDelete(array $data)
    {

        PharmacyStock::where('id', $data['item_id'])->delete();

        return $addedPhamacyItem = 'Deleted sucssesfuly';
    }


    public function getItemName(array $data)
    {

        $getPhamacyItem =   InventoryItems::get();

        return $getPhamacyItem;
    }



    public function orderComleted(array $data)
    {
        $PatientOrder =  PatientOrder::find($data['patient_order_id']);

        $PatientOrder->oder_status = $data['oder_status'];

        if ("cash" == $PatientOrder->payment_method) {
            $PatientOrder->payment_status = "done";
        }

        if ($PatientOrder->save()) {
            $PatientInvoice = PatientInvoice::where('patient_order_id', '=', $data['patient_order_id'])
            ->first();
            $PatientInvoice->payment_status = "done";
            $PatientInvoice->save();
        }
         return $PatientOrder;


    }


    public function submittedPayment(array $data)
    {
        $patientInvoice = PatientInvoice::with('patientInventory')
        ->where('patient_order_id', '=', $data['patient_order_id'])->first();

        $patientInvoice->payment_status = $data['payment_status'];
        $patientInvoice->payment_method = $data['payment_method'];


        if($patientInvoice->save()){

            $PatientOrder = PatientOrder::find($data['patient_order_id']);

            $PatientOrder->oder_status = $data['oder_status'];
            $PatientOrder->payment_status = $data['payment_status'];
            $PatientOrder->payment_method = $data['payment_method'];
            $PatientOrder->save();
        }

        return $patientInvoice;
    }




    public function getFilterData(array $filterData)
    {
        $defultArgs = [
            'perPage' => 100,
            'search' => '',
            'oderBy' => 'id',
            'oder' => 'desc'
        ];

        return array_merge($defultArgs, $filterData);
    }

    public function getNearPharmacy(array $data)
    {
        $lat = $data['lat'];
        $lng = $data['lng'];
        $distance = $data['distance'];

        $results = DB::select(DB::raw('SELECT *, ( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $lng . ') ) + sin( radians(' . $lat .') ) * sin( radians(lat) ) ) ) AS distance FROM pharmacy HAVING distance < ' . $distance . ' ORDER BY distance') );


        return $results;
    }

    public function orderRequest(array $data)
    {
        if(empty($data['image_path'])){
            return $data["Sorry, not receipt founded, please try again."];
        }


        $data = $this->preperableForDB($data);
        $pationOrder = PatientOrder::create($this->prepareDataForRegister($data));
        if (!$pationOrder) {

            throw new Exception("Sorry, user order does not registered, please try again.", 500);
        }

        return $pationOrder;



    }



    public function prepareDataForRegister(array $data)
    {
        return [

            'pharmacy_id' => $data['pharmacy_id'],
            'patient_id' => $data['patient_id'],
            'image_path' => $data['image_path'],
            'user_comment' => $data['user_comment'],
            'oder_status' => $data['oder_status'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],

        ];
    }

    public function preperableForDB(array $data): array
    {
        if (!empty($data['image_path'])) {
            $data['image_path'] = $this->imageUpload($data['image_path']);
        }
        return $data;
    }

    public function uploadImage($image): string
    {

        $imageName = time() . '.' . $image->extension();
        $url = $image->storePubliclyAS('receipt', $imageName);
        return 'storage/' . $url;
    }

    public function imageUpload($image){


        if($image){

        $image = 'data:image/jpeg;base64,' . $image;



        if (preg_match('/^data:image\/(\w+);base64,/', $image)) {
            $ext = explode(';base64', $image);
            $ext = explode('/', $ext[0]);
            $ext = $ext[1];

            $data = substr($image, strpos($image, ',') + 1);
            $data = base64_decode($data);


            $name = time().'.' . $ext;
            $url = "receipt/" . $name;
            Storage::put($url, $data);

            return 'storage/' . $url;

            //$url = $image->storePubliclyAS('receipt', $name);




        }


        }
        return response()->json(['http_status'=>'success','data'=>'fail','message'=>'Image cannot be find']);





    }




}
