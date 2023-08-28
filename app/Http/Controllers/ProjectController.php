<?php

namespace App\Http\Controllers;

use App\Commons\Traits\apiResponse;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\Project\ProjectCollection;
use App\Http\Resources\Project\ProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use apiResponse;

    protected ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request)
    {
        $projects = $this->projectService->getAllProject($request,[
            'user'
        ]);
        return $this->apiSuccess(new ProjectCollection($projects));
    }

    public function store(CreateProjectRequest $request)
    {
        $project = $this->projectService->createProject($request->validated());
        return $this->apiSuccess(new ProjectResource($project));
    }

    public function show($id)
    {
        $project = $this->projectService->getProjectById($id,[
            'user'
        ]);

        if (!$project) {
            return $this->apiError([], "Project Not Found", 404);
        }
        return $this->apiSuccess(new ProjectResource($project));
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $project = $this->projectService->getProjectById($id);

        if (!$project) {
            return $this->apiError([], "Project Not Found", 404);
        }

        $project = $this->projectService->updateProject($request->validated(), $id);
        return $this->apiSuccess(new ProjectResource($project));
    }

    public function delete($id)
    {
        $project = $this->projectService->getProjectById($id);

        if (!$project) {
            return $this->apiError([], "Project Not Found", 404);
        }

        $this->projectService->deleteProject($id);

        return $this->apiSuccess([], "Project Deleted Successfully");
    }
}
