<?php

namespace App\Services\Workshop;

use App\Contract\Workshop\IWorkshopExpenseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * class WorkshopExpenseService
 * @package App\Services\Workshop
 * @property IWorkshopExpenseRepository $workshopExpenseRepository
 */
class WorkshopExpenseService
{
    private IWorkshopExpenseRepository $workshopExpenseRepository;

    public function __construct(IWorkshopExpenseRepository $workshopExpenseRepository)
    {
        $this->workshopExpenseRepository = $workshopExpenseRepository;
    }

    public function getAllWorkshopExpense(int $page, int $perPage = 10, array $with = []): LengthAwarePaginator
    {
        return $this->workshopExpenseRepository->paginate($page, $perPage, $with);
    }

    public function getWorkshopExpenseById($workshopId, array $with = [])
    {
        return $this->workshopExpenseRepository->find($workshopId, $with);
    }

    public function createWorkshopExpense(array $data)
    {
        $data['user_id'] = auth()->user()->id;

        return $this->workshopExpenseRepository->create($data);
    }

    public function updateWorkshopExpense(array $data, $id)
    {
        return $this->workshopExpenseRepository->update($data, $id);
    }

    public function deleteWorkshopExpense($id)
    {
        return $this->workshopExpenseRepository->delete($id);
    }
}
