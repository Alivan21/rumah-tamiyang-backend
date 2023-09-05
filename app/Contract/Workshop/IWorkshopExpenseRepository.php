<?php

namespace App\Contract\Workshop;

use App\Contract\ICrud;

interface IWorkshopExpenseRepository extends ICrud
{
    public function paginate(int $page, int $perPage = 10, array $with = []);

    public function find(int $id);
}
