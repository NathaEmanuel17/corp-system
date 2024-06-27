<?php

namespace App\Http\Middleware;

use App\Services\MenuService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VeriyUrlAccessControl
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function handle(Request $request, Closure $next): Response
    {   
        $role = auth()->user()->role;
        $currentPath = $request->getPathInfo();
        $requestMethod = $request->method();

        $hasPermission = $this->menuService->checkPermission($role, $currentPath, $requestMethod);

        if ($hasPermission) {
            return $next($request);
        }

        return redirect('dashboard')->with(
            [
                'message' => '-_- Ops ... você não tem acesso!',
                'type' => 'warning'
            ]
        );
    }
}
