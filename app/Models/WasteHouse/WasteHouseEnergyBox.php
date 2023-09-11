<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int user_id
 * @property string date
 * @property int amount
 * @property string description
 */
class WasteHouseEnergyBox extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'waste_house_energy_boxes';

    protected $fillable = [
        'user_id',
        'date',
        'amount',
        'description',
    ];

    protected $dates = [
        'date',
    ];
}
