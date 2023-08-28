<?php

namespace App\Contract;


interface IProjectRepository
{
    public function paginate(int $page, int $perPage = 10, array $with = []);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, array $with = []);
}
