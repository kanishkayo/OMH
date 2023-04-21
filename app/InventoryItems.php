<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryItems extends Model
{
    use SoftDeletes;
    protected $table = 'inventory_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['sub_category','item_name','created_at', 'updated_at','deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at','deleted_at',
    ];

}
