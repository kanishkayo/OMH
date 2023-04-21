<?php

namespace App\Repositories;

use App\Http\Requests\LoginRequest;
use App\Interfaces\DBPreperableInterface;
use App\Interfaces\UserInterface;
use App\Mail\RegistrationEmail;
use App\PatientProfile;
use App\PharmacyProfile;
use App\User;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;
use GoogleMaps\GoogleMaps;
use Illuminate\Support\Facades\Mail;
use stdClass;

class AuthRepository implements DBPreperableInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login(array $data)
    {
        $user = $this->getUserByEmail($data['email']);
        if (!$user) {

            throw new Exception("Sorry, user does not exist", 404);
        }
        if (!$this->isValidPassword($user, $data)) {

            throw new Exception("Sorry, password does not match", 401);
        }

        auth()->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        $tokenInstance = $this->createAuthToken($user);
        return $this->getAuthData($user, $tokenInstance);
    }

    public function all(array $filterData)
    {
        $filter = $this->getFilterData($filterData);
        $query = $this->model::with('pharmacyProfile','phamarcyStock')->orderBy($filter['oderBy'], $filter['oder']);


        if (!empty($filter['search'])) {
            $query->where(function ($query) use ($filter) {
                $searched = '%' . $filter['search'] . '%';
                $query->where('email', 'like', $searched)
                    ->orWhere('role', 'like', $searched);
            });
        }
        return $query->get();
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

    public function getPharmacy(array $data){

    }

    public function register(array $data)
    {
        $Userdata = $this->model::create($this->prepareDataForRegister($data['userDetails']));
        if (!$Userdata) {

            throw new Exception("Sorry, Services request does not registered, please try again.", 500);
        }
        //$existingUser = $this->model::find($Userdata->id);
        $existingUser = null;
        $returnData = [];

        if ($Userdata->role == "patient") {
            $existingUser = $this->model::with('patientProfile')->find($Userdata->id);
            // $patientDetails = new PatientProfile($data['patientProfile']);
            // $existingUser->patientProfile()->save($patientDetails);

            if (isset($data['patientProfile'])) {
                $patientDetails = new PatientProfile($this->prepareDataForRegistePatient($data['patientProfile']));
                $existingUser->patientProfile()->save($patientDetails);

                // $patientDetails->age = $data['patientProfile']['age'];
                // $patientDetails->medical_history =$data['patientProfile']['medical_history'];


               // $existingUser->patientProfile()->save($patientDetails);

                 $returnData = $this->model::with('patientProfile')->find($Userdata->id);
            }

        } else {
            $existingUser = $this->model::with('pharmacyProfile')->find($Userdata->id);

            if (isset($data['pharmacyProfile'])) {

                $pharmacyDetails = new PharmacyProfile($data['pharmacyProfile']);
                $existingUser->pharmacyProfile()->save($pharmacyDetails);
                $returnData = $this->model::with('pharmacyProfile')->find($Userdata->id);
            }
        }

      //  $user = user::where('id','=','56');
        //var_dump( $user);
        $email =  $Userdata ->email;
        $password = "Abcdef@123";


        $this->sendEmail($email, $password, $Userdata );

       // return $returnData;

       // return $data['pharmacyProfile'];

    }

     public function resetPassword(array $data){
        $user=User::where('id','=',$data['id'])->first();
        $this->sendEmail($data['email'],$data['password'],$user);
        return $data ="email sended";
     }

    public function sendEmail($email, $password, $user){

        $cc = [
            [
                'email' => 'ineshmadhushan@gmail.com',
                'name' => 'inesh',
            ]
        ];
        // $user  = [
        //     [
        //         'email' => 'tayonu@gmail.com',
        //         'name' => 'tayon',
        //     ]
        // ];//user object

        $message = new stdClass();
        $message->body = "Your account has been created. Please sign in using following credentials.

        Email: " . $email . "

        Password:  " . $password . "

        web link : http://localhost:3000/";

        $message->user = $user->full_name;
        $message->subject = "Password Notification";

        Mail::to($user)->cc($cc)->send(new RegistrationEmail($message));
    }

    public function update(array $data, $id)
    {
        $user = $this->getById($id);
        $data = $this->preperableForDB($data);

        if (!$user->update($this->prepareDataForRegister($data))) {

            throw new Exception("Sorry, user does not updated, please try again.", 500);
        }

        return $this->getById($id);
    }

    public function delete(array $data)
    {
        $id = $data['id'];
        $user = $this->getById($id);
        $deleted = $user->delete();

        if (!$deleted) {

            throw new Exception("Sorry, user could not deleted, please try again.", 500);
        }

        return $user;
    }

    public function getUserByEmail(string $email): ?User
    {
        return User::where('email', '=', $email)->first();
    }

    public function isValidPassword(User $user, array $data): bool
    {
        return Hash::check($data['password'], $user->password);
    }

    public function createAuthToken(User $user): PersonalAccessTokenResult
    {
        return $user->createToken('authToken');
    }

    public function getAuthData(User $user, PersonalAccessTokenResult $tokenInstance): array
    {
        return [
            'user' => $user,
            'access_token' => $tokenInstance->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenInstance->token->expires_at)->toDateTimeString(),
        ];
    }

    public function prepareDataForRegister(array $data)
    {


        return [

            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $data['image'],
            'full_name' => $data['full_name'],
            'role' => $data['role'],
            'province' => $data['province'],
            'district' => $data['district'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'status' => $data['status'],
            'nic' => $data['nic'],
            'contact_number' => $data['contact_number'],
            'mobile_number' => $data['mobile_number'],
            'street_address' => $data['street_address'],
            'city' => $data['city'],

        ];
    }

    public function prepareDataForRegistePatient(array $data)
    {

        $dob = new DateTime($data['birthday']);
        $age = $dob->diff(new DateTime())->y;

        return [

            'age' => $age,
            'birthday' => $data['birthday'],
            'medical_history' => $data['medical_history'],

        ];
    }

    public function preperableForDB(array $data): array
    {
        if (!empty($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
        }else{
            $data['image'] ="storage/UserProfileImage/profilePicDefault.png";
        }
        return $data;
    }

    public function uploadImage($image): string
    {

        $imageName = time() . '.' . $image->extension();
        $url = $image->storePubliclyAS('UserProfileImage', $imageName);
        return 'storage/' . $url;
    }

    public function getById($id)
    {
        $data = $this->model->find($id);
        if (empty($data)) {

            throw new Exception("user does not exist", Response::HTTP_NOT_FOUND);

        }

        return $data;
    }
}
