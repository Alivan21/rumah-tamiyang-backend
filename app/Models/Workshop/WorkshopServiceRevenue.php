<?php

namespace App\Models\Workshop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property int $revenue
 * @property string $date
 * @property User $users
 */
class WorkshopServiceRevenue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'revenue',
        'date',
    ];

    protected $dates = [
        'date'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function workshopServiceDescriptions()
    {
        return $this->hasMany(WorkshopServiceDescription::class);
    }
}
