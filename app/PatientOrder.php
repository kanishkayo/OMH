<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientOrder extends Model
{
    use SoftDeletes;
    protected $table = 'patient_oder';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'pharmacy_id',
        'patient_id',
        'image_path',
        'user_comment',
        'net_amount',
        'oder_status',
        'payment_method',
        'payment_status',
        'lat',
        'lng',
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

    public function patient()
    {
        return $this->belongsTo(PatientProfile::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(PharmacyProfile::class);
    }

    public function patientinvoice()
    {
        return $this->hasMany(PatientInvoice::class, 'patient_order_id');
    }


}
