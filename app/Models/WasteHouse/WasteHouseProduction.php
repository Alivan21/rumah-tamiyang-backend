<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WasteHouseProduction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'waste_house_productions';

    protected $fillable = [
        'waste_house_lists_id',
        'date',
        'amount',
        'description',
    ];

    protected $dates = [
        'date',
    ];
}
