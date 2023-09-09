<?php

namespace App\Models\Workshop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
