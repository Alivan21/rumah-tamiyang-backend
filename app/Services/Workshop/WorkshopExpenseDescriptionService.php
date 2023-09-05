<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopDescriptionRepository;

/**
 * class WorkshopServiceDescriptionService
 * @package App\Services\Workshop
 * @property IWorkshopDescriptionRepository $workshopServiceDescriptionRepository
 */
class WorkshopExpenseDescriptionService
{
    private IWorkshopDescriptionRepository $workshopExpenseDescriptionRepository;

    public function __construct(IWorkshopDescriptionRepository $workshopExpenseDescriptionRepository)
    {
        $this->workshopExpenseDescriptionRepository = $workshopExpenseDescriptionRepository;
    }

    public function createWorkshopExpenseDescription(array $data)
    {
        $dataWorkshop = [];

        foreach ($data['data'] as $value) {
            $dataWorkshop[] = [
                'workshop_expenses_id' => $value['workshop_expenses_id'],
                'workshop_expense_lists_id' => $value['workshop_expense_lists_id'],
                'description' => $value['description'] ?? null,
                'amount' => $value['amount'] ?? 0
            ];
        }

        return $this->workshopExpenseDescriptionRepository->create($dataWorkshop);
    }

    public function updateWorkshopExpenseDescription(array $data, $id)
    {
        return $this->workshopExpenseDescriptionRepository->update($data, $id);
    }

    public function deleteWorkshopExpenseDescription($id)
    {
        return $this->workshopExpenseDescriptionRepository->delete($id);
    }
}
