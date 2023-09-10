<?php

namespace App\Models\Workshop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $expense
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 */
class WorkshopExpense extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'workshop_expenses';

    protected $fillable = [
        'user_id',
        'expense',
        'date',
    ];

    protected $dates = [
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workshopExpenseDescription()
    {
        return $this->hasMany(WorkshopExpenseDescription::class);
    }
}
