<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Services\MenuService;

class ManageMenuPermissionController extends Controller
{
    public function __construct(protected MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menus = $this->menuService->paginate(10);
        $urlAccessControl = $this->menuService->findAllPermissionMenu();
        
        return view('pages.app.settings.menu.manage', compact('menus', 'urlAccessControl'));
    }
}
