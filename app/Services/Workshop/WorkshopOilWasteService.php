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

    public function paginateWorkshopOilWaste(int $page, int $perPage = 10, array $with = [])
    {
        return $this->workshopOilWasteRepository->paginate($page, $perPage, $with);
    }

    public function findWorkshopOilWaste(int $id, array $with = [])
    {
        return $this->workshopOilWasteRepository->find($id, $with);
    }

    public function createWorkshopOilWaste(array $data)
    {
        $data['user_id'] = auth()->user()->id;

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
