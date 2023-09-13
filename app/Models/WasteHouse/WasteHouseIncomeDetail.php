<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int waste_house_lists_id
 * @property int waste_house_income_id
 * @property int amount
 * @property string description
 */
class WasteHouseIncomeDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'waste_house_lists_id',
        'waste_house_income_id',
        'amount',
        'description',
    ];
}
