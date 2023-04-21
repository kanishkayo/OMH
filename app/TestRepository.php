<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestRepository extends Model
{

    use SoftDeletes;
    protected $table = 'leco_services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['provided_services','services_description','status'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at','deleted_at',
    ];

}
