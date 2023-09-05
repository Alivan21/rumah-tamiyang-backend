<?php

namespace App\Contract;

interface ICrud
{
    public function create(array $data);
    public function update(array $data, int $id);
    public function delete(int $id);
}
