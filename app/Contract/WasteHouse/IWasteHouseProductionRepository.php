<?php

namespace App\Contract\WasteHouse;

use App\Contract\ICrud;

interface IWasteHouseProductionRepository extends ICrud
{
    public function paginate(int $page, int $perPage = 10, array $with = []);
}
