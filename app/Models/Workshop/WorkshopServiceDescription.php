<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopServiceDescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'workshop_service_id',
        'workshop_service_revenue_id',
        'description',
        'amount'
    ];
}
