<?php

namespace App\Models\WasteHouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 */
class WasteHouseList extends Model
{
    use HasFactory;

    protected $table = 'waste_house_lists';

    protected $fillable = [
        'name',
    ];
}
