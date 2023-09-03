<?php

namespace App\Contract\Workshop;

interface IWorkshopServiceRevenueRepository
{
    public function paginate(int $page, int $perPage = 10, array $with = []);
    public function create(array $data);
    public function find(int $id);
    public function update(array $data, int $id);
    public function delete(int $id);
}
