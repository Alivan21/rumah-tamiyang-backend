<?php

namespace App\Services\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseWasteOilRepository;

class WasteHouseWasteOilService
{
    private IWasteHouseWasteOilRepository $wasteHouseWasteOilRepository;

    public function __construct(IWasteHouseWasteOilRepository $wasteHouseWasteOilRepository)
    {
        $this->wasteHouseWasteOilRepository = $wasteHouseWasteOilRepository;
    }

    public function createWasteHouseWasteOil(array $data)
    {
        return $this->wasteHouseWasteOilRepository->create($data);
    }

    public function updateWasteHouseWasteOil(array $data, int $id)
    {
        return $this->wasteHouseWasteOilRepository->update($data, $id);
    }

    public function deleteWasteHouseWasteOil(int $id)
    {
        return $this->wasteHouseWasteOilRepository->delete($id);
    }
}
