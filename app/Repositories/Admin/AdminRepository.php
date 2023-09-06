<?php

namespace App\Repositories\Admin;

use App\Contract\Admin\IAdminRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class AdminRepository implements IAdminRepository
{
    private Builder $query;

    public function __construct(User $model)
    {
        $this->query = $model->newQuery();
    }

    public function paginate(int $page, int $perPage = 10, array $with = [])
    {
        return $this->query->with($with)->paginate($perPage, ['*'], 'page', $page);
    }

    public function find(int $id)
    {
        return $this->query->findOrFail($id);
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
