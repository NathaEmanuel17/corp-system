<?php

namespace App\Services;

use App\Repositories\MenuRepository;
use App\Repositories\UrlAccessControlRepository;

class MenuService
{
    public function __construct(protected MenuRepository $menuRepository, protected UrlAccessControlRepository $urlAccessControlRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->urlAccessControlRepository = $urlAccessControlRepository;
    }

    public function find(int $id)
    {
        return $this->menuRepository->find(id: $id, withTrashed: true);
    }

    public function findAllPermissionMenu()
    {
        try {
            return $this->menuRepository->all(['urlAccessControl']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function paginate(int $perPage)
    {
        return $this->menuRepository->paginate($perPage);
    }

    public function store(array $storeMenuRequest)
    {
        $menu = $this->menuRepository->store($storeMenuRequest);
        

        $roles = ['admin', 'user', 'manager'];

        foreach ($roles as $role) {
            $permissions = [
                'can_create' => ($role === 'admin'),
                'can_read' => ($role === 'admin'),
                'can_update' => ($role === 'admin'),
                'can_delete' => ($role === 'admin'),
                'menu_id' => $menu->id,
                'role' => $role,
            ];

            $this->urlAccessControlRepository->store($permissions);
        }

        return redirect()->back()->with('message', 'Menu cadastrado com sucesso!')->with('type', 'success');
    }

    public function update(int $id, array $updateMenuRequest)
    {
        $this->menuRepository->update($id, $updateMenuRequest);

        return redirect()->back()->with('message', 'Menu editado com sucesso!')->with('type', 'success');
    }

    public function toggleActivation(int $id)
    {
        $this->menuRepository->toggleActivation($id);

        return redirect()->back()->with('message', 'Ação realizada com sucesso!')->with('type', 'success');
    }

    public function checkPermission($role, $currentPath, $requestMethod)
    {
        $currentPath = $this->adjustPutPath($currentPath);
       
        if ($requestMethod === 'GET') {
            $parts = explode('/', $currentPath);
            $currentPath = '/' . $parts[1];
        }

        $menu = $this->menuRepository->findByPath($currentPath);
        
        if (!$menu) {
            return false;
        }

        $permission = $this->urlAccessControlRepository->findPermission($menu->id, $role);
        if (!$permission) {
            return false;
        }
        
        switch ($requestMethod) {
            case 'GET':
                return $permission->can_read;
            case 'POST':
                return $permission->can_create;
            case 'PUT':
                $currentPath = $this->adjustPutPath($currentPath);
                return $permission->can_update;
            case 'DELETE':
                return $permission->can_delete;
            default:
                return false;
        }
    }

    private function adjustPutPath($currentPath)
    {
        return preg_replace('/\/\d+$/', '/{id}', $currentPath);
    }
}
