<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopExpense extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'workshop_expenses';

    protected $fillable = [
        'user_id',
        'expense',
        'date',
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
