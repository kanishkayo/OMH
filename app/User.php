<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    const AGRICULTURE_SPECIALIST_TYPE = 'ADMIN';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role',
        'image',
        'nic',
        'contact_number',
        'mobile_number',
        'lat',
        'lng',
        'street_address',
        'google_address',
        'province',
        'district',
        'city',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected $append =['image_url'];

    // public function getImageUrlAttribute()
    // {
    //    if (empty($this->image)) {
    //     return null;
    //    }
    //    return  url('/').Storage::url($this->image);
    // }


    // -----------------------middleware Agriculture Specialist---------------------------------------------------------
    public function isAgricultureSpecialist(){
        return $this->role === self::AGRICULTURE_SPECIALIST_TYPE;
    }



    public function jobDetails()
    {
        return $this->hasMany(CustomerRequestedJobDetails::class, 'agent_id');
    }


    public function pharmacyProfile()
    {
        return $this->hasOne(PharmacyProfile::class, 'user_id');
    }

    public function patientProfile()
    {
        return $this->hasOne(PatientProfile::class, 'user_id');
    }

    public function phamarcyStock()
    {
        return $this->hasMany(PharmacyStock::class, 'pharmacy_id');
    }


}
