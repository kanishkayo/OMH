<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientInventoryItem extends Model
{
    use SoftDeletes;
    protected $table = 'patien_inventory_items';

    protected $fillable = [
        'item_name',
        'item_id',
        'qutty',
        'total',
        'status',
        'invoice_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function patientInvoice()
    {
        return $this->belongsTo(PatientInvoice::class);
    }

}
