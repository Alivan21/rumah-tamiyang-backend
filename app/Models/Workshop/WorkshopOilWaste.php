<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopOilWaste extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'workshop_oil_wastes';

    protected $fillable = [
        'user_id',
        'date',
        'oil_collects',
        'oil_out',
    ];

    protected $dates = [
        'date',
    ];
}
