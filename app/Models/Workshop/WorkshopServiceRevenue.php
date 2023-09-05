<?php

namespace App\Models\Workshop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->user_id = auth()->user()->id;
        });
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function workshopServiceDescriptions()
    {
        return $this->hasMany(WorkshopServiceDescription::class);
    }
}
