<?php

namespace App\Repositories\CafeRevenue;

use App\Contract\ICafeRevenueRepository;
use App\Models\CafeRevenue;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class CafeRevenueRepository implements ICafeRevenueRepository
{
    private $query;

    public function __construct(CafeRevenue $model) {
        $this->query = $model->newQuery();
    }
    public function create(array $data): CafeRevenue|Builder|Collection|array|bool
    {
        return $this->query->create($data);
    }

}
