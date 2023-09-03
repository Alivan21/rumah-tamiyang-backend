<?php

namespace App\Repositories\Workshop;

use App\Contract\Workshop\IWorkshopServiceRepository;
use App\Models\WorkshopService;
use Illuminate\Database\Eloquent\Builder;

class WorkshopServiceRepository implements IWorkshopServiceRepository
{
    private Builder $query;

    public function __construct(WorkshopService $model)
    {
        $this->query = $model->newQuery();
    }
    public function paginate(int $page, int $perPage = 10, array $with = [])
    {
        $this->query->with($with)->paginate($perPage, ['*'], 'page', $page);
    }

    public function create(array $data)
    {
        $this->query->create($data);
    }

    public function find(int $id)
    {
        $this->query->findOrFail($id);
    }

    public function update(array $data, int $id)
    {
        $this->query->where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        $this->query->where('id', $id)->delete();
    }
}
