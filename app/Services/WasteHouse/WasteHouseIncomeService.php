<?php

namespace App\Services\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseIncomeRepository;
use App\Services\Params\GeneralFilterParams;

class WasteHouseIncomeService
{
    private IWasteHouseIncomeRepository $wasteHouseIncomeRepository;

    public function __construct(IWasteHouseIncomeRepository $wasteHouseIncomeRepository)
    {
        $this->wasteHouseIncomeRepository = $wasteHouseIncomeRepository;
    }

    public function paginate(GeneralFilterParams $params, array $with = [])
    {
        return $this->wasteHouseIncomeRepository->paginate($params->page, $params->perPage, $with);
    }

    public function findWasteHouseIncome(int $id, array $with = [])
    {
        return $this->wasteHouseIncomeRepository->find($id, $with);
    }

    public function createWasteHouseIncome(array $data)
    {
        $data['user_id'] = auth()->user()->id;

        return $this->wasteHouseIncomeRepository->create($data);
    }

    public function updateWasteHouseIncome(array $data, int $id)
    {
        return $this->wasteHouseIncomeRepository->update($data, $id);
    }

    public function deleteWasteHouseIncome(int $id)
    {
        return $this->wasteHouseIncomeRepository->delete($id);
    }
}
