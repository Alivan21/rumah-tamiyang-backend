<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopOilWaste extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'workshop_oil_wastes';

    protected $fillable = [
        'user_id',
        'date',
        'oil collects',
        'oil_out',
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
