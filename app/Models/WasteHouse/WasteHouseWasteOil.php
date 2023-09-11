<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property int $amount
 * @property string $origin
 */
class WasteHouseWasteOil extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable =[
        'date',
        'amount',
        'origin',
        'user_id'
    ];

    protected $dates = [
        'date',
    ];
}
