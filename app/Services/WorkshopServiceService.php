<?php
namespace App\Services;

use App\Contract\Workshop\IWorkshopServiceRepository;
use Illuminate\Http\Client\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class WorkshopServiceService
 * @package App\Services
 * @property IWorkshopServiceRepository $workshopServiceRepository
 */
class WorkshopServiceService
{
    private IWorkshopServiceRepository $workshopServiceRepository;

    public function __construct(IWorkshopServiceRepository $workshopServiceRepository)
    {
        $this->workshopServiceRepository = $workshopServiceRepository;
    }

    public function getAllWorkshopService(Request $request,array $with = []): LengthAwarePaginator
    {
        return $this->workshopServiceRepository->paginate($request->page,$request->perPage, $with);
    }

    public function createWorkshopService(array $data)
    {
        return $this->workshopServiceRepository->create($data);
    }

    public function getWorkshopServiceById($id)
    {
        return $this->workshopServiceRepository->find($id);
    }

    public function updateWorkshopService(array $data, $id)
    {
        return $this->workshopServiceRepository->update($data, $id);
    }

    public function deleteWorkshopService($id)
    {
        return $this->workshopServiceRepository->delete($id);
    }
}
