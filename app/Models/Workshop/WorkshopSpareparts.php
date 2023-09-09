<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkshopSpareparts extends Model
{
    use HasFactory;


    protected $fillable = [
        'name'
    ];
}
