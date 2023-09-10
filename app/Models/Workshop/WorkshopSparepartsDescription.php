<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $workshop_sparepart_id
 * @property integer $workshop_sparepart_revenue_id
 * @property string $description
 * @property integer $amount
 * @property WorkshopSpareparts $workshopSpareparts
 * @property WorkshopSparepartsRevenue $workshopServiceRevenue
 */
class WorkshopSparepartsDescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'workshop_spareparts_descriptions';

    protected $fillable = [
        'workshop_sparepart_id',
        'workshop_sparepart_revenue_id',
        'description',
        'amount'
    ];

    public function workshopSpareparts()
    {
        return $this->belongsTo(WorkshopSpareparts::class);
    }
}
