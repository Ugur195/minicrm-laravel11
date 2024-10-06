<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Client\{StoreClientRequest, UpdateClientRequest};
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $clients = Client::query()->paginate(12);

        return view('clients.index', compact('clients'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('clients.create');
    }

    /**
     * @param StoreClientRequest $request
     * @return RedirectResponse
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::query()->create($request->validated());

        return redirect()->route('clients.index');
    }

    /**
     * @param Client $client
     * @return View
     */
    public function edit(Client $client): View
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * @param UpdateClientRequest $request
     * @param Client $client
     * @return RedirectResponse
     */
    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return redirect()->route('clients.index');
    }

    /**
     * @param Client $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        Gate::authorize(PermissionEnum::DELETE_CLIENTS);

        $client->delete();
        return redirect()->route('clients.index');
    }
}
