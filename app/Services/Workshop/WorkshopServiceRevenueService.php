<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopServiceRepository;
use App\Contract\Workshop\IWorkshopServiceRevenueRepository;
use Illuminate\Http\Client\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * class WorkshopServiceRevenueService
 * @package App\Services\Workshop
 * @property IWorkshopServiceRepository $workshopServiceRevenueRepository
 */
class WorkshopServiceRevenueService
{
    private IWorkshopServiceRevenueRepository $workshopServiceRevenueRepository;

    public function __construct(IWorkshopServiceRevenueRepository $workshopServiceRevenueRepository)
    {
        $this->workshopServiceRevenueRepository = $workshopServiceRevenueRepository;
    }

    public function getAllWorkshopServiceRevenue(int $page, int $perPage = 10, array $with = []): LengthAwarePaginator
    {
        return $this->workshopServiceRevenueRepository->paginate($page, $perPage, $with);
    }

    public function getWorkshopServiceRevenueByWorkshopId($workshopId)
    {
        return $this->workshopServiceRevenueRepository->find($workshopId);
    }

    public function createWorkshopServiceRevenue(array $data)
    {
        return $this->workshopServiceRevenueRepository->create($data);
    }

    public function updateWorkshopServiceRevenue(array $data, $id)
    {
        return $this->workshopServiceRevenueRepository->update($data, $id);
    }

    public function deleteWorkshopServiceRevenue($id)
    {
        return $this->workshopServiceRevenueRepository->delete($id);
    }
}
