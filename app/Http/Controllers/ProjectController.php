<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Project\{StoreProjectRequest,UpdateProjectRequest};
use App\Models\{Client,Project,User};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $projects = Project::query()->with(['user', 'client'])->paginate(10);

        return view('projects.index', compact('projects'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $users = User::query()->select('id', 'first_name', 'last_name')->get();
        $clients = Client::query()->select('id', 'company_name')->get();

        return view('projects.create', compact('users', 'clients'));
    }

    /**
     * @param StoreProjectRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        Project::query()->create($request->validated());

        return redirect()->route('projects.index');
    }

    /**
     * @param Project $project
     * @return View
     */
    public function edit(Project $project): View
    {
        $users = User::query()->select('id', 'first_name', 'last_name')->get();
        $clients = Client::query()->select('id', 'company_name')->get();

        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    /**
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        return redirect()->route('projects.index');
    }

    /**
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {
        Gate::authorize(PermissionEnum::DELETE_PROJECTS);

        $project->delete();
        return redirect()->route('projects.index');
    }
}
