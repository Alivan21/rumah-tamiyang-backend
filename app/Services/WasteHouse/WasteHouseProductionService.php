<?php

namespace App\Services\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseProductionDetailRepository;
use App\Contract\WasteHouse\IWasteHouseProductionRepository;
use App\Services\Params\GeneralFilterParams;
use Illuminate\Support\Facades\DB;

class WasteHouseProductionService
{
    private IWasteHouseProductionRepository $wasteHouseProductionRepository;
    private IWasteHouseProductionDetailRepository $wasteHouseProductionDetailRepository;

    public function __construct(
        IWasteHouseProductionRepository $wasteHouseProductionRepository,
        IWasteHouseProductionDetailRepository $wasteHouseProductionDetailRepository
    )
    {
        $this->wasteHouseProductionDetailRepository = $wasteHouseProductionDetailRepository;
        $this->wasteHouseProductionRepository = $wasteHouseProductionRepository;
    }

    public function paginate(GeneralFilterParams $params, array $with = [])
    {
        return $this->wasteHouseProductionRepository->paginate($params->page, $params->perPage, $with);
    }

    public function findWasteHouseProduction(int $id, array $with = [])
    {
        return $this->wasteHouseProductionRepository->find($id, $with);
    }

    public function createWasteHouseProduction(array $data)
    {
        try {
            DB::beginTransaction();

            $data['user_id'] = auth()->user()->id;

            $dataProduction = $this->wasteHouseProductionRepository->create($data);

            $dataProductionDetail = [];

            foreach ($data['data'] as $value)
            {
                $dataProductionDetail[] = [
                    'waste_house_production_id' => $dataProduction->id,
                    'waste_house_lists_id' => $value['waste_house_lists_id'],
                    'description' => $value['description'] ?? null,
                    'amount' => $value['amount'] ?? 0
                ];
            }

            $this->wasteHouseProductionDetailRepository->create($dataProductionDetail);

            DB::commit();

            return $dataProduction->fresh();

        }catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }

//        return $this->wasteHouseProductionRepository->create($data);
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
