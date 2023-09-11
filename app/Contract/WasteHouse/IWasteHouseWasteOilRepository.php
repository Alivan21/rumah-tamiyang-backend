<?php

namespace App\Contract\WasteHouse;

use App\Contract\ICrud;

interface IWasteHouseWasteOilRepository extends ICrud
{
    public function paginate(int $page, int $perPage = 10, array $with = []);
    public function find(int $id, array $with = []);
}
