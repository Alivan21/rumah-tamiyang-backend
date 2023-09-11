<?php

namespace App\Repositories\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseWasteOilRepository;
use App\Models\WasteHouse\WasteHouseWasteOil;
use Illuminate\Database\Eloquent\Builder;

class WasteHouseWasteOilRepository implements IWasteHouseWasteOilRepository
{
    private Builder $query;

    public function __construct(WasteHouseWasteOil $model)
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

    public function find(int $id, array $with = [])
    {
        return $this->query->with($with)->findOrFail($id);
    }
}
