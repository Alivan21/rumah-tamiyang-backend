<?php

namespace App\Services\Workshop;
use App\Contract\Workshop\IWorkshopSparepartDescriptionRepository;
use App\Contract\Workshop\IWorkshopSparepartRevenueRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class WorkshopSparepartRevenueService
{
    private IWorkshopSparepartRevenueRepository $workshopSparepartRevenueRepository;
    private IWorkshopSparepartDescriptionRepository $workshopSparepartDescriptionRepository;

    public function __construct(
        IWorkshopSparepartRevenueRepository $workshopSparepartRevenueRepository,
        IWorkshopSparepartDescriptionRepository $workshopSparepartDescriptionRepository
    )
    {
        $this->workshopSparepartRevenueRepository = $workshopSparepartRevenueRepository;
        $this->workshopSparepartDescriptionRepository = $workshopSparepartDescriptionRepository;

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
        try {
            DB::beginTransaction();

            $data['user_id'] = auth()->user()->id;

            $dataRevenue = $this->workshopSparepartRevenueRepository->create($data);

            $dataWorkshop = [];

            foreach ($data['data'] as $value) {
                $dataWorkshop[] = [
                    'workshop_spareparts_id' => $value['workshop_spareparts_id'],
                    'workshop_spareparts_revenue_id' => $dataRevenue->id,
                    'description' => $value['description'] ?? null,
                    'amount' => $value['amount'] ?? 0
                ];
            }

            $this->workshopSparepartDescriptionRepository->create($dataWorkshop);

            DB::commit();

            return $dataRevenue->fresh();
        }catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

//        return $this->workshopSparepartRevenueRepository->create($data);
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
