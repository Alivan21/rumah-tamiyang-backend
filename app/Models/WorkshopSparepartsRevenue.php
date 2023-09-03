<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopSparepartsRevenue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'date',
        'revenue'
    ];

    protected $dates = [
        'date'
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->user_id = auth()->user()->id;
        });
    }
}
