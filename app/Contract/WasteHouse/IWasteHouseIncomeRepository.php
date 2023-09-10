<?php

namespace App\Contract\WasteHouse;

use App\Contract\ICrud;

interface IWasteHouseIncomeRepository extends ICrud
{
    public function paginate(int $page = 1,int $perPage = 10, array $filters = []);
}
