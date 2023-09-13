<?php

namespace App\Repositories\WasteHouse;

use App\Models\WasteHouse\WasteHouseIncomeDetail;
use Illuminate\Database\Eloquent\Builder;

class WasteHouseIncomeDetailRepository implements \App\Contract\WasteHouse\IWasteHouseIncomeDetailRepository
{
    private Builder $query;

    public function __construct(WasteHouseIncomeDetail $model)
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

    public function paginate(int $page = 1, int $perPage = 10, array $with = [])
    {
        // TODO: Implement paginate() method.
    }

    public function find(int $id, array $with = [])
    {
        // TODO: Implement find() method.
    }
}
