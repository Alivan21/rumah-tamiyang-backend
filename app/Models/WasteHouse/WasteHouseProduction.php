<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WasteHouseProduction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'waste_house_lists_id',
        'date',
        'amount',
        'description',
    ];

    protected $dates = [
        'date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->user_id = auth()->user()->id;
        });
    }
}
