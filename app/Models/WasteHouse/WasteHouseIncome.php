<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string date
 * @property int income
 * @property WasteHouseList wasteHouseList
 * @property WasteHouseIncomeDetail wasteHouseIncomeDetail
 */
class WasteHouseIncome extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'waste_house_incomes';

    protected $dates = [
        'date',
    ];

    protected $fillable = [
        'user_id',
        'date',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function wasteHouseList()
    {
        return $this->belongsTo(WasteHouseList::class);
    }

}
