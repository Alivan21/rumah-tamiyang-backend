<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer waste_house_lists_id
 * @property integer waste_house_production_id
 * @property double amount
 * @property string description
 */
class WasteHouseProductionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'waste_house_lists_id',
        'waste_house_production_id',
        'amount',
        'description'
    ];


}
