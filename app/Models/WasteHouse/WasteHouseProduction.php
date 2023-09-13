<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property integer $income
 * @property WasteHouseList $wasteHouseList
 * @property WasteHouseProductionDetail $wasteHouseProductionDetail
 */
class WasteHouseProduction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'waste_house_productions';

    protected $fillable = [
        'user_id',
        'date',
        'income',
    ];

    protected $dates = [
        'date',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function wasteHouseList()
    {
        return $this->belongsTo(WasteHouseList::class);
    }

    public function wasteHouseProductionDetail()
    {
        return $this->hasMany(WasteHouseProductionDetail::class);
    }
}
