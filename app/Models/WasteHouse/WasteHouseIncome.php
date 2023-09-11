<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int waste_house_list_id
 * @property string date
 * @property int amount
 * @property string description
 * @property WasteHouseList wasteHouseList
 */
class WasteHouseIncome extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'waste_house_incomes';

    protected $dates = [
        'date',
    ];

    protected $fillable = [
        'waste_house_list_id',
        'date',
        'amount',
        'description',
    ];

}
