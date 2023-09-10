<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $workshop_expense_id
 * @property integer $workshop_expense_lists_id
 * @property integer $amount
 * @property string $description
 * @property WorkShopExpenseList $workshopExpenseList
 */
class WorkshopExpenseDescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'workshop_expense_descriptions';

    protected $fillable = [
        'workshop_expense_id',
        'workshop_expense_lists_id',
        'amount',
        'description'
    ];

    public function workshopExpenseList()
    {
        return $this->belongsTo(WorkshopExpenseList::class, 'workshop_expense_lists_id');
    }
}
