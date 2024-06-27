<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Services\MenuService;

class MenuController extends Controller
{
    public function __construct(protected MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        return $this->menuService->store($request->validated());
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $menu = $this->menuService->find($id);
        return view('pages.app.settings.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, int $id)
    {
        return $this->menuService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->menuService->toggleActivation($id);
    }
}
