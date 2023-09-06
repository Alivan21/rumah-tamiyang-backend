<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopOilWasteRepository;

class WorkshopOilWasteService
{
    private IWorkshopOilWasteRepository $workshopOilWasteRepository;

    public function __construct(IWorkshopOilWasteRepository $workshopOilWasteRepository)
    {
        $this->workshopOilWasteRepository = $workshopOilWasteRepository;
    }

    public function createWorkshopOilWaste(array $data)
    {
        return $this->workshopOilWasteRepository->create($data);
    }

    public function updateWorkshopOilWaste(array $data, int $id)
    {
        return $this->workshopOilWasteRepository->update($data, $id);
    }

    public function deleteWorkshopOilWaste(int $id)
    {
        return $this->workshopOilWasteRepository->delete($id);
    }
}
