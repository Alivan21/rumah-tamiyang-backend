<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopExpenseList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
