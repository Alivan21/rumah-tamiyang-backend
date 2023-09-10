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

    public function getAllWorkshopServiceRevenue($request, array $with = []): LengthAwarePaginator
    {
        return $this->workshopServiceRevenueRepository->paginate($request->page, $request->perPage, $with);
    }

    public function getWorkshopServiceRevenueByWorkshopId($workshopId, $with = [])
    {
        return $this->workshopServiceRevenueRepository->find($workshopId, $with);
    }

    public function createWorkshopServiceRevenue(array $data)
    {
        $data['user_id'] = auth()->user()->id;
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
