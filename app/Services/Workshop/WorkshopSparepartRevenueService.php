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

    public function getWorkshopSparepartRevenueByWorkshopId($id, array $with = [])
    {
        return $this->workshopSparepartRevenueRepository->find($id, $with);
    }

    public function createWorkshopSparepartRevenue(array $data)
    {
        $data['user_id'] = auth()->user()->id;

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
