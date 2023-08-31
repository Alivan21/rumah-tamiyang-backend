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

    public function createCafeRevenue(array $data)
    {
        $revenue = (float) $data['revenue'];
        $expense = (float) $data['expense'];

        if ($revenue > 0) {
            $profitPercentage = (($revenue - $expense) / $revenue) * 100;
        } else {
            $profitPercentage = 0; // Prevent division by zero
        }

        $data['profit'] = number_format($profitPercentage, 2);

        return $this->cafeRepository->create($data);
    }
}
