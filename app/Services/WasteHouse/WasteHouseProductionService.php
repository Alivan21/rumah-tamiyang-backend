<?php

namespace App\Services\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseProductionRepository;

class WasteHouseProductionService
{
    private IWasteHouseProductionRepository $wasteHouseProductionRepository;

    public function __construct(IWasteHouseProductionRepository $wasteHouseProductionRepository)
    {
        $this->wasteHouseProductionRepository = $wasteHouseProductionRepository;
    }

    public function createWasteHouseProduction(array $data)
    {
        return $this->wasteHouseProductionRepository->create($data);
    }

    public function updateWasteHouseProduction(array $data, int $id)
    {
        return $this->wasteHouseProductionRepository->update($data, $id);
    }

    public function deleteWasteHouseProduction($id)
    {
        return $this->wasteHouseProductionRepository->delete($id);
    }
}
