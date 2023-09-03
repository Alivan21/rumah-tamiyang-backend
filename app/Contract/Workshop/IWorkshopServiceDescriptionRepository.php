<?php

namespace App\Contract\Workshop;

interface IWorkshopServiceDescriptionRepository
{
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
