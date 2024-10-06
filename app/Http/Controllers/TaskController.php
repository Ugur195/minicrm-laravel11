<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\{Task\StoreTaskRequest, Task\UpdateTaskRequest};
use App\Models\{Client, Project, Task, User};
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $tasks = Task::query()->with(['user', 'client', 'project'])->paginate(20);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $users = User::query()->select('id', 'first_name', 'last_name')->get();
        $clients = Client::query()->select('id', 'company_name')->get();
        $projects = Project::query()->select('id', 'title')->get();

        return view('tasks.create', compact('users', 'clients', 'projects'));
    }

    /**
     * @param StoreTaskRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTaskRequest $request)
    {
        Task::query()->create($request->validated());

        return redirect()->route('tasks.index');
    }

    /**
     * @param Task $task
     * @return View
     */
    public function edit(Task $task):View
    {
        $users = User::query()->select('id', 'first_name', 'last_name')->get();
        $clients = Client::query()->select('id', 'company_name')->get();
        $projects = Project::query()->select('id', 'title')->get();

        return view('tasks.edit', compact('task', 'users', 'clients','projects'));
    }

    /**
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(UpdateTaskRequest $request, Task $task):RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        Gate::authorize(PermissionEnum::DELETE_TASKS);

        $task->delete();
        return redirect()->route('tasks.index');
    }
}
