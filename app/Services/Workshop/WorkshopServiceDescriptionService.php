<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopDescriptionRepository;

/**
 * class WorkshopServiceDescriptionService
 * @package App\Services\Workshop
 * @property IWorkshopDescriptionRepository $workshopServiceDescriptionRepository
 */
class WorkshopServiceDescriptionService
{
    private IWorkshopDescriptionRepository $workshopServiceDescriptionRepository;

    public function __construct(IWorkshopDescriptionRepository $workshopServiceDescriptionRepository)
    {
        $this->workshopServiceDescriptionRepository = $workshopServiceDescriptionRepository;
    }

    public function createWorkshopServiceDescription(array $data)
    {
        $dataWorkshop = [];

        foreach ($data['data'] as $value) {
            $dataWorkshop[] = [
                'workshop_service_id' => $value['workshop_service_id'],
                'workshop_service_revenue_id' => $value['workshop_service_revenue_id'],
                'description' => $value['description'] ?? null,
                'amount' => $value['amount'] ?? 0
            ];
        }

        return $this->workshopServiceDescriptionRepository->create($dataWorkshop);
    }

    public function updateWorkshopServiceDescription(array $data, $id)
    {
        return $this->workshopServiceDescriptionRepository->update($data, $id);
    }

    public function deleteWorkshopServiceDescription($id)
    {
        return $this->workshopServiceDescriptionRepository->delete($id);
    }
}
