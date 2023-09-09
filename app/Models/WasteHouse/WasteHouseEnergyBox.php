<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WasteHouseEnergyBox extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'waste_house_energy_boxes';

    protected $fillable = [
        'waste_house_production_lists_id',
        'date',
        'amount',
        'description',
    ];

    protected $dates = [
        'date',
    ];
}
