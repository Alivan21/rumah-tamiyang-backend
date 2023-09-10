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

    public function paginate(int $page, int $perPage = 10, array $with = [])
    {
        return $this->wasteHouseProductionRepository->paginate($page, $perPage, $with);
    }

    public function createWasteHouseProduction(array $data)
    {
        $data['user_id'] = auth()->user()->id;

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
