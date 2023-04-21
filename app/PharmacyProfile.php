<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class PharmacyProfile extends Model
{
    use SoftDeletes;
    protected $table = 'pharmacy';


    public static function proximitySearch($lat, $lng, $distance){

        $results = DB::select(DB::raw('SELECT *, ( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $lng . ') ) + sin( radians(' . $lat .') ) * sin( radians(lat) ) ) ) AS distance FROM pharmacy HAVING distance < ' . $distance . ' ORDER BY distance') );


        return $results;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'pharmacy_name',
        'pharmacy_reg_id',
        'gaverment_registration_id',
        'proprietors_name',
        'pharmacy_address',
        'contact_number',
        'mobile_number',
        'email',
        'lat',
        'lng',
        'google_address',
        'province',
        'district',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at','deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function patientOder()
    {
        return $this->hasMany(PatientOrder::class, 'pharmacy_id');
    }

    public function pharmacyStock()
    {
        return $this->hasMany(PharmacyStock::class, 'pharmacy_id');
    }

    public function patientinvoice()
    {
        return $this->hasMany(PatientInvoice::class, 'pharmacy_id');
    }
}
