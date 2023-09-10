<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 */
class WorkshopSpareparts extends Model
{
    use HasFactory;


    protected $fillable = [
        'name'
    ];

    public function workshopSparepartsDescriptions()
    {
        return $this->hasMany(WorkshopSparepartsDescription::class);
    }
}
