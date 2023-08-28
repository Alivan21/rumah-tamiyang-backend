<?php

namespace App\Repositories\Project;

use App\Contract\IProjectRepository;
use App\Models\Project;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProjectRepository implements IProjectRepository
{
    private $query;

    public function __construct(Project $model)
    {
        $this->query = $model->newQuery();
    }

    public function paginate(int $page, int $perPage = 10, array $with = []): LengthAwarePaginator
    {
        return $this->query
            ->with($with)
            ->paginate($perPage, ['*'], 'page', $page);
    }

    public function create(array $data): Project|Builder|Collection|array|bool
    {
        return $this->query->create($data);
    }


    public function update(array $data, $id): Project|Builder|Collection|array|bool
    {
       $this->query->where('id', $id)->update($data);

       return $this->find($id)->fresh();
    }

    public function delete($id): Project|Builder|Collection|array|bool
    {
        return $this->query->where('id', $id)->delete();
    }

    public function find($id, array $with = []): Project|Builder|Collection|array|bool|null
    {
        $result = $this->query->where('id', $id)->with($with)->first();

        if ($result === null) {
            return null;
        }

        return $result;
    }
}
