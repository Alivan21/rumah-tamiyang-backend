<?php

namespace App\Repositories\CafeRevenue;

use App\Contract\ICafeRevenueRepository;
use App\Models\CafeRevenue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CafeRevenueRepository implements ICafeRevenueRepository
{
    private Builder $query;

    public function __construct(CafeRevenue $model) {
        $this->query = $model->newQuery();
    }

    public function paginate(int $page, int $perPage = 10, array $with = []): LengthAwarePaginator
    {
        return $this->query->with($with)->paginate($perPage, ['*'], 'page', $page);
    }

    public function find(int $id): CafeRevenue|Builder|Collection|array
    {
        return $this->query->findOrFail($id);
    }

    public function create(array $data): CafeRevenue|Builder|Collection|array|bool
    {
        return $this->query->create($data);
    }

    public function update(array $data, int $id): CafeRevenue|array|Builder|Collection
    {
         $this->query->where('id', $id)->update($data);

        return $this->find($id);
    }

    public function delete(int $id): bool
    {
        return $this->query->where('id', $id)->delete();
    }
}
