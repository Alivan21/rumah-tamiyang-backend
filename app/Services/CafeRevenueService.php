<?php

namespace App\Services;

use App\Contract\ICafeRevenueRepository;

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
    public function allCafeRevenue(int $page, int $perPage = 10, array $with = [])
    {
        return $this->cafeRepository->paginate($page, $perPage, $with);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createCafeRevenue(array $data)
    {
        $data = $this->getArr($data);

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
            'revenue' => $data['revenue'] ?? $existingData['revenue'],
            'expense' => $data['expense'] ?? $existingData['expense'],
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
        $revenue = (float)$data['revenue'] ?? 0;
        $expense = (float)$data['expense'] ?? 0;

        if ($revenue > 0) {
            $profitPercentage = (($revenue - $expense) / $revenue) * 100;
        } else {
            $profitPercentage = 0; // Prevent division by zero
        }

        $data['profit'] = number_format($profitPercentage, 2);

        return $data;
    }

}
