<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerRequestedJobList extends Model
{
    use SoftDeletes;
    protected $table = 'customer_requested_job_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_name',
        'service_id',
        'service_charge',
        'service_status',
        'customer_requested_job_details_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jobDetails()
    {
        return $this->belongsTo(CustomerRequestedJobDetails::class);
    }



}
