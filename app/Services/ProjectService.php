<?php

namespace App\Services;


use App\Contract\IProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ProjectService
 * @package App\Services
 * @property IProjectRepository $projectRepository
 * @property Request $request
 */
class ProjectService
{
    protected $projectRepository;
    public function __construct(IProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getAllProject(Request $request, array $with = []): LengthAwarePaginator
    {
        return $this->projectRepository->paginate($request->page,$request->perPage, $with);
    }

    public function createProject(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        return $this->projectRepository->create($data);
    }

    public function getProjectById($id, array $with = [])
    {
        return $this->projectRepository->find($id, $with);
    }

    public function updateProject(array $data, $id)
    {
        return $this->projectRepository->update($data, $id);
    }

    public function deleteProject($id)
    {
        return $this->projectRepository->delete($id);
    }
}
