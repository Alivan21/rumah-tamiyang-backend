<?php

namespace App\Contract;
interface ICafeRevenueRepository extends ICrud
{
    public function paginate(int $page, int $perPage = 10, array $with = []);
    public function find(int $id);
}
