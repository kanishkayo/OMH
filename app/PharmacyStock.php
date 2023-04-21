<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PharmacyStock extends Model
{
    use SoftDeletes;
    protected $table = 'phamarcy_stock';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'moh_inventory_id',
        'inventory_item_name',
        'stock',
        'pharmacy_id',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at','deleted_at',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(PharmacyProfile::class);
    }
}
