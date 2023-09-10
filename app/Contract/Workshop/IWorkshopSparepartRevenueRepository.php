<?php

namespace App\Contract\Workshop;

use App\Contract\ICrud;

interface IWorkshopSparepartRevenueRepository extends ICrud
{
    public function paginate(int $page, int $perPage = 10, array $with = []);
    public function find(int $id, array $with = []);
}
