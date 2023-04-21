<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerRequestedJobDetails extends Model
{
    use SoftDeletes;
    protected $table = 'customer_requested_job_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_account_number',
        'customer_name',
        'customer_contact_number',
        'customer_address',
        'customer_lat',
        'customer_lng',
        'services_provider_lat',
        'services_provider_lng',
        'services_schedule_date',
        'services_schedule_time',
        'services_re_schedule_date',
        'services_re_schedule_time',
        'total_services_charge',
        'net_total_services_chage',
        'agent_id',
        'job_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class);
    }

    public function jobList()
    {
        return $this->hasMany(CustomerRequestedJobList::class, 'customer_requested_job_details_id');
    }

}
