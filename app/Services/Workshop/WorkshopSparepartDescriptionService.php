<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopDescriptionRepository;

class WorkshopSparepartDescriptionService
{
    private IWorkshopDescriptionRepository $workshopSparepartDescriptionRepository;

    public function __construct(IWorkshopDescriptionRepository $workshopSparepartDescriptionRepository)
    {
        $this->workshopSparepartDescriptionRepository = $workshopSparepartDescriptionRepository;
    }

    public function createWorkshopSparepartDescription(array $data)
    {
        $dataWorkshop = [];

        foreach ($data['data'] as $value) {
            $dataWorkshop[] = [
                'workshop_sparepart_id' => $value['workshop_sparepart_id'],
                'workshop_sparepart_revenue_id' => $value['workshop_sparepart_revenue_id'],
                'description' => $value['description'] ?? null,
                'amount' => $value['amount'] ?? 0
            ];
        }

        return $this->workshopSparepartDescriptionRepository->create($dataWorkshop);
    }

    public function updateWorkshopSparepartDescription(array $data, $id)
    {
        return $this->workshopSparepartDescriptionRepository->update($data, $id);
    }

    public function deleteWorkshopSparepartDescription($id)
    {
        return $this->workshopSparepartDescriptionRepository->delete($id);
    }
}
