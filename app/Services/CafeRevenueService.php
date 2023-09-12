<?php

namespace App\Services;

use App\Contract\ICafeRevenueRepository;
use App\Services\Params\GeneralFilterParams;

class CafeRevenueService
{
    private $cafeRepository;

    public function __construct(ICafeRevenueRepository $cafeRepository)
    {
        $this->cafeRepository = $cafeRepository;
    }

    /**
     * @param int $page
     * @param int $perPage
     * @param array $with
     * @return mixed
     */
    public function allCafeRevenue(GeneralFilterParams $params, array $with = [])
    {
        return $this->cafeRepository->paginate($params->page, $params->perPage, $with);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createCafeRevenue(array $data)
    {
        $data = $this->getArr($data);
        $data['user_id'] = auth()->user()->id;

        return $this->cafeRepository->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function updateCafeRevenue(array $data, int $id): mixed
    {
        // Fetch existing data for the specified ID
        $existingData = $this->cafeRepository->find($id);

        // Determine which fields to update based on the provided data
        $updatedData = [
            'purchase' => $data['purchase'] ?? $existingData['purchase'],
            'sale' => $data['sale'] ?? $existingData['sale'],
        ];

        $dataWithProfit = $this->getArr($updatedData);

        return $this->cafeRepository->update($dataWithProfit, $id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function showCafeRevenue(int $id): mixed
    {
        return $this->cafeRepository->find($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteCafeRevenue(int $id): bool
    {
        return $this->cafeRepository->delete($id);
    }

    /**
     * @param array $data
     * @return array
     */
    private function getArr(array $data): array
    {
        $purchase = (float)$data['purchase'] ?? 0;
        $sale = (float)$data['sale'] ?? 0;

        $income = $sale - $purchase;

        $data['income'] = $income;

        return $data;
    }

}
