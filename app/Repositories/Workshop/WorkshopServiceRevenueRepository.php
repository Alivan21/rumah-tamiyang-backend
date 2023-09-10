<?php

namespace App\Repositories\Workshop;
use App\Contract\Workshop\IWorkshopServiceRevenueRepository;
use App\Models\Workshop\WorkshopServiceRevenue;
use Illuminate\Database\Eloquent\Builder;

class WorkshopServiceRevenueRepository implements IWorkshopServiceRevenueRepository
{
    private Builder $query;

    public function __construct(WorkshopServiceRevenue $model)
    {
        $this->query = $model->newQuery();
    }
    public function paginate(int $page, int $perPage = 10, $with = [])
    {
        return $this->query->with($with)->paginate($perPage, ['*'], 'page', $page);
    }

    public function create(array $data)
    {
        return $this->query->create($data);
    }

    public function find(int $id, $with = [])
    {
        return $this->query->with($with)->findOrFail($id);
    }

    public function update(array $data, int $id)
    {
        $this->query->where('id', $id)->update($data);

        return $this->find($id);
    }

    public function delete(int $id)
    {
        return $this->query->where('id', $id)->delete();
    }
}
