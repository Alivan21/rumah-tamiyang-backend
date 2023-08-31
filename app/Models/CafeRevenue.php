<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property double $revenue
 * @property double $expense
 * @property float $profit
 * @property \DateTime|Carbon $date
 *
 */

class CafeRevenue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'revenue',
        'date',
        'expense',
        'profit'
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
}
