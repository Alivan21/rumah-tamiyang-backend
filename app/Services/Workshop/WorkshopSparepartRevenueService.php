<?php

namespace App\Services\Workshop;
use App\Contract\Workshop\IWorkshopSparepartRevenueRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class WorkshopSparepartRevenueService
{
    private IWorkshopSparepartRevenueRepository $workshopSparepartRevenueRepository;

    public function __construct(IWorkshopSparepartRevenueRepository $workshopSparepartRevenueRepository)
    {
        $this->workshopSparepartRevenueRepository = $workshopSparepartRevenueRepository;
    }

    public function getAllWorkshopSparepartRevenue(int $page, int $perPage = 10, array $with = []): LengthAwarePaginator
    {
        return $this->workshopSparepartRevenueRepository->paginate($page, $perPage, $with);
    }

    public function getWorkshopSparepartRevenueByWorkshopId($id)
    {
        return $this->workshopSparepartRevenueRepository->find($id);
    }

    public function createWorkshopSparepartRevenue(array $data)
    {
        return $this->workshopSparepartRevenueRepository->create($data);
    }

    public function updateWorkshopSparepartRevenue(array $data, $id)
    {
        return $this->workshopSparepartRevenueRepository->update($data, $id);
    }

    public function deleteWorkshopSparepartRevenue($id)
    {
        return $this->workshopSparepartRevenueRepository->delete($id);
    }
}
