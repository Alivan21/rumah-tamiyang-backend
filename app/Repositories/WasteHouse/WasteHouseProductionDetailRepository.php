<?php

namespace App\Repositories\WasteHouse;

use Illuminate\Database\Eloquent\Builder;
use App\Models\WasteHouse\WasteHouseProductionDetail;

class WasteHouseProductionDetailRepository implements \App\Contract\WasteHouse\IWasteHouseProductionDetailRepository
{
    private Builder $query;

    public function __construct(WasteHouseProductionDetail $model)
    {
        $this->query = $model->newQuery();
    }
    public function create(array $data)
    {
        $createdRecords = [];

        foreach ($data as $recordData) {
            $createdRecord = $this->query->create($recordData);
            $createdRecords[] = $createdRecord;
        }

        return $createdRecords;
    }

    public function update(array $data, int $id)
    {
        $this->query->where('id', $id)->update($data);

        return $this->query->findOrFail($id);
    }

    public function delete(int $id)
    {
        return $this->query->where('id', $id)->delete();
    }
}
