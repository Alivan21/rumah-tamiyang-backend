<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopServiceDescription;

/**
 * class WorkshopServiceDescriptionService
 * @package App\Services\Workshop
 * @property IWorkshopServiceDescription $workshopServiceDescriptionRepository
 */
class WorkshopServiceDescriptionService
{
    private IWorkshopServiceDescription $workshopServiceDescriptionRepository;

    public function __construct(IWorkshopServiceDescription $workshopServiceDescriptionRepository)
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
