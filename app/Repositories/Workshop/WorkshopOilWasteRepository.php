<?php

namespace App\Repositories\Workshop;

use App\Contract\Workshop\IWorkshopOilWasteRepository;
use App\Models\Workshop\WorkshopOilWaste;
use Illuminate\Database\Eloquent\Builder;

class WorkshopOilWasteRepository implements IWorkshopOilWasteRepository
{
    private Builder $query;

    public function __construct(WorkshopOilWaste $model)
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

    public function paginate(int $page, int $perPage = 10, array $with = [])
    {
        return $this->query->with($with)->paginate($perPage, ['*'], 'page', $page);
    }

    public function find(int $id, array $with = [])
    {
        return $this->query->with($with)->find($id);
    }
}
