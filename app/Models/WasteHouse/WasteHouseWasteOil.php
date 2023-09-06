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
        'origin'
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
