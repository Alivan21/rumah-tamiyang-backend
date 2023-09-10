<?php

namespace App\Models\Workshop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int user_id
 * @property string date
 * @property int revenue
 * @property User users
 */
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

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workshopSparepartsDescriptions()
    {
        return $this->hasMany(WorkshopSparepartsDescription::class);
    }
}
