<?php

namespace App\Contract\Admin;

use App\Contract\ICrud;

interface IAdminRepository extends ICrud
{
    public function paginate(int $page, int $perPage = 10, array $with = []);
    public function find(int $id);
}
