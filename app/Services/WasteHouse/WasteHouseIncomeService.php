<?php

namespace App\Services\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseIncomeDetailRepository;
use App\Contract\WasteHouse\IWasteHouseIncomeRepository;
use App\Services\Params\GeneralFilterParams;
use Illuminate\Support\Facades\DB;

class WasteHouseIncomeService
{
    private IWasteHouseIncomeRepository $wasteHouseIncomeRepository;
    private IWasteHouseIncomeDetailRepository $wasteHouseIncomeDetailRepository;

    public function __construct(
        IWasteHouseIncomeRepository $wasteHouseIncomeRepository,
        IWasteHouseIncomeDetailRepository $wasteHouseIncomeDetailRepository
    )
    {
        $this->wasteHouseIncomeRepository = $wasteHouseIncomeRepository;
        $this->wasteHouseIncomeDetailRepository = $wasteHouseIncomeDetailRepository;
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
        try {
            DB::beginTransaction();

            $data['user_id'] = auth()->user()->id;
            $dataIncome = $this->wasteHouseIncomeRepository->create($data);

            $dataIncomeDetail = [];

            foreach ($data['data'] as $value)
            {
                $dataIncomeDetail[] = [
                    'waste_house_income_id' => $dataIncome->id,
                    'waste_house_lists_id' => $value['waste_house_lists_id'],
                    'description' => $value['description'] ?? null,
                    'amount' => $value['amount'] ?? 0
                ];
            }

            $this->wasteHouseIncomeDetailRepository->create($dataIncomeDetail);

            DB::commit();

            return $dataIncome->fresh();
        }catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getMessage());
        }

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
