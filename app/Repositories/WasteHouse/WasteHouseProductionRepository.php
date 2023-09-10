<?php

namespace App\Repositories\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseProductionRepository;
use App\Models\WasteHouse\WasteHouseProduction;
use App\Models\WasteHouse\WasteHouseWasteOil;
use Illuminate\Database\Eloquent\Builder;

class WasteHouseProductionRepository implements IWasteHouseProductionRepository
{
    private Builder $query;

    public function __construct(WasteHouseProduction $model)
    {
        $this->query = $model->newQuery();
    }

    public function paginate(int $page, int $perPage = 10, array $with = [])
    {
        return $this->query->with($with)->paginate($perPage, ['*'], 'page', $page);
    }

    public function create(array $data)
    {
        return $this->query->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->query->where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->query->where('id', $id)->delete();
    }
}
