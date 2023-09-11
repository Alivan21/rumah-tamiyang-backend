<?php

namespace App\Services\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseEnergyBoxRepository;

class WasteHouseEnergyBoxService
{
    private IWasteHouseEnergyBoxRepository $wasteHouseEnergyBoxRepository;

    public function __construct(IWasteHouseEnergyBoxRepository $wasteHouseEnergyBoxRepository)
    {
        $this->wasteHouseEnergyBoxRepository = $wasteHouseEnergyBoxRepository;
    }

    public function paginate(int $page = 1, int $perPage = 10, array $with = [])
    {
        return $this->wasteHouseEnergyBoxRepository->paginate($page, $perPage, $with);
    }

    public function findWasteHouseEnergyBox(int $id, array $with = [])
    {
        return $this->wasteHouseEnergyBoxRepository->find($id, $with);
    }

    public function createWasteHouseEnergyBox(array $data)
    {
        $data['user_id'] = auth()->user()->id;

        return $this->wasteHouseEnergyBoxRepository->create($data);
    }

    public function updateWasteHouseEnergyBox(array $data, int $id)
    {
        return $this->wasteHouseEnergyBoxRepository->update($data, $id);
    }

    public function deleteWasteHouseEnergyBox(int $id)
    {
        return $this->wasteHouseEnergyBoxRepository->delete($id);
    }
}
