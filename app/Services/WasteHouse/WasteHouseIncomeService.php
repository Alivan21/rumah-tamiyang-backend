<?php

namespace App\Services\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseIncomeRepository;

class WasteHouseIncomeService
{
    private IWasteHouseIncomeRepository $wasteHouseIncomeRepository;

    public function __construct(IWasteHouseIncomeRepository $wasteHouseIncomeRepository)
    {
        $this->wasteHouseIncomeRepository = $wasteHouseIncomeRepository;
    }

    public function paginate(int $page = 1, int $perPage = 10, array $with = [])
    {
        return $this->wasteHouseIncomeRepository->paginate($page, $perPage, $with);
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
