<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteHouseList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
