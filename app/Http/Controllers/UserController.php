<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\{StoreRequest,UpdateRequest};
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $users = User::query()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        User::query()->create($request->validated());

        return redirect()->route('users.index');
    }

    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect()->route('users.index');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
