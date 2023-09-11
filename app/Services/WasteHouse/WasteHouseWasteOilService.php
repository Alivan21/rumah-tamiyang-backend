<?php

namespace App\Services\WasteHouse;

use App\Contract\WasteHouse\IWasteHouseWasteOilRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class WasteHouseWasteOilService
{
    private IWasteHouseWasteOilRepository $wasteHouseWasteOilRepository;

    public function __construct(IWasteHouseWasteOilRepository $wasteHouseWasteOilRepository)
    {
        $this->wasteHouseWasteOilRepository = $wasteHouseWasteOilRepository;
    }

    public function paginate(int $page, int $perPage = 10, array $with = []): LengthAwarePaginator
    {
        return $this->wasteHouseWasteOilRepository->paginate($page, $perPage, $with);
    }

    public function findWasteHouseWasteOil(int $id, array $with = [])
    {
        return $this->wasteHouseWasteOilRepository->find($id, $with);
    }

    public function createWasteHouseWasteOil(array $data)
    {
        $data['user_id'] = auth()->user()->id;

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
