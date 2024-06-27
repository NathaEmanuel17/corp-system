<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct(protected ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clients = $this->clientService->paginate(10, $request->all());

        return view('pages.app.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.app.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        return $this->clientService->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('pages.app.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('pages.app.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        return $this->clientService->update($client->id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        return $this->clientService->delete($client);
    }
}
