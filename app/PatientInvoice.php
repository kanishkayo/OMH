<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientInvoice extends Model
{
    use SoftDeletes;
    protected $table = 'patient_invoice';

    protected $fillable = [
        'pharmacy_id',
        'patient_id',
        'net_total',
        'payment_status',
        'net_amount',
        'payment_method',
        'created_at',
        'updated_at',
        'deleted_at',
        'patient_order_id'
    ];

    public function patient()
    {
        return $this->belongsTo(PatientProfile::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(PharmacyProfile::class);
    }

    public function patientOder()
    {
        return $this->belongsTo(PatientOrder::class);
    }



    public function patientInventory()
    {
        return $this->hasMany(PatientInventoryItem::class, 'invoice_id');
    }

}
