<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopDescriptionRepository;
use App\Contract\Workshop\IWorkshopServiceDescriptionRepository;
use App\Contract\Workshop\IWorkshopServiceRepository;
use App\Contract\Workshop\IWorkshopServiceRevenueRepository;
use Illuminate\Http\Client\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * class WorkshopServiceRevenueService
 * @package App\Services\Workshop
 * @property IWorkshopServiceRepository $workshopServiceRevenueRepository
 * @property IWorkshopServiceDescriptionRepository $workshopServiceDescriptionRepository
 */
class WorkshopServiceRevenueService
{
    private IWorkshopServiceRevenueRepository $workshopServiceRevenueRepository;
    private IWorkshopServiceDescriptionRepository $workshopServiceDescriptionRepository;

    public function __construct(
        IWorkshopServiceRevenueRepository $workshopServiceRevenueRepository,
        IWorkshopServiceDescriptionRepository $workshopServiceDescriptionRepository
    )
    {
        $this->workshopServiceRevenueRepository = $workshopServiceRevenueRepository;
        $this->workshopServiceDescriptionRepository = $workshopServiceDescriptionRepository;
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
        try {
            DB::beginTransaction();
            $data['user_id'] = auth()->user()->id;

            $dataRevenue = $this->workshopServiceRevenueRepository->create($data);

            $dataWorkshop = [];

            foreach ($data['data'] as $value) {
                $dataWorkshop[] = [
                    'workshop_service_id' => $value['workshop_service_id'],
                    'workshop_service_revenue_id' => $dataRevenue->id,
                    'description' => $value['description'] ?? null,
                    'amount' => $value['amount'] ?? 0
                ];
            }

            $this->workshopServiceDescriptionRepository->create($dataWorkshop);

            DB::commit();

            return $dataRevenue->fresh();

        }catch (\Exception $exception) {
            DB::rollBack();

            throw $exception;
        }


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
