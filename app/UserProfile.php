<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;
    protected $table = 'user_profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'full_name',
        'gender',
        'nic',
        'phone_number',
        'aditional_phone_number',
        'experience',
        'address',
        'qualifications_description'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at','deleted_at',
    ];

   
}
