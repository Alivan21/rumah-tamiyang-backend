<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $workshop_service_id
 * @property integer $workshop_service_revenue_id
 * @property string $description
 * @property integer $amount
 * @property WorkshopService $workshopService
 * @property WorkshopServiceRevenue $workshopServiceRevenue
 */
class WorkshopServiceDescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'workshop_service_id',
        'workshop_service_revenue_id',
        'description',
        'amount'
    ];

    public function workshopService()
    {
        return $this->belongsTo(WorkshopService::class);
    }

}
