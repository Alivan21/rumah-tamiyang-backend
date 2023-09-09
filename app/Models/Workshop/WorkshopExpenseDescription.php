<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopExpenseDescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'workshop_expenses_id',
        'workshop_expenses_lists_id',
        'amount',
        'description'
    ];
}
