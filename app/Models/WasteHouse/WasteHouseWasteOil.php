<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
