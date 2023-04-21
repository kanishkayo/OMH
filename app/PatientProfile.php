<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientProfile extends Model
{
    use SoftDeletes;
    protected $table = 'patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'age',
        'medical_history',
        'birthday',
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
        return $this->hasMany(PatientOrder::class, 'patient_id');
    }

    public function patientinvoice()
    {
        return $this->hasMany(PatientInvoice::class, 'patient_id');
    }
}
