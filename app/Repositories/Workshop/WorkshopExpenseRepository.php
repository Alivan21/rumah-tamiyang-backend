<?php

namespace App\Repositories\Workshop;

use App\Contract\Workshop\IWorkshopExpenseRepository;

class WorkshopExpenseRepository implements IWorkshopExpenseRepository
{
    private Builder $query;

    public function paginate(int $page, int $perPage = 10, array $with = [])
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function find(int $id)
    {
        // TODO: Implement find() method.
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
