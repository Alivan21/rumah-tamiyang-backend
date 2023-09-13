<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property integer $oil_collects
 * @property integer $oil_out
 */
class WorkshopOilWaste extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'workshop_oil_wastes';

    protected $fillable = [
        'user_id',
        'date',
        'oil_collects',
        'oil_out',
    ];

    protected $dates = [
        'date',
    ];
}
