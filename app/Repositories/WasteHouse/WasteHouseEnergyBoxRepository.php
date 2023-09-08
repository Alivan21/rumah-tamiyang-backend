<?php

namespace App\Repositories\WasteHouse;

use Illuminate\Database\Eloquent\Builder;
use App\Contract\WasteHouse\IWasteHouseEnergyBoxRepository;
use App\Models\WasteHouse\WasteHouseEnergyBox;
class WasteHouseEnergyBoxRepository implements IWasteHouseEnergyBoxRepository
{
    private Builder $query;

    public function __construct(WasteHouseEnergyBox $model)
    {
        $this->query = $model->newQuery();
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
