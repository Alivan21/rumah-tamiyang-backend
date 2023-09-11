<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $waste_house_lists_id
 * @property string $date
 * @property integer $amount
 * @property string $description
 * @property WasteHouseList $wasteHouseList
 */
class WasteHouseProduction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'waste_house_productions';

    protected $fillable = [
        'user_id',
        'waste_house_lists_id',
        'date',
        'amount',
        'description',
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
}
