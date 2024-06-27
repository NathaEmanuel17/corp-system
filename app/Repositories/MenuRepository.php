<?php

namespace App\Repositories;

use App\Models\Menu;


class MenuRepository extends BaseRepository
{
    public function __construct(protected Menu $menu)
    {
        parent::__construct($menu);
    }

    public function toggleActivation(int $id)
    {
        $menu = $this->obj->withTrashed()->findOrFail($id);

        if ($menu->deleted_at) {
            return $menu->restore();
        } else {
            return $menu->delete();
        }
    }

    public function findByPath(string $currentPath): ?Menu
    {
        $currentPath = preg_replace('/\/\d+/', '/{id}', $currentPath);
        $parts = explode('/', $currentPath);
        $currentPath = '/' . $parts[1];

        return $this->obj->where(function ($query) use ($currentPath) {
            $query->where('route_get', $currentPath)
                ->orWhere('route_post', $currentPath)
                ->orWhere('route_put', $currentPath)
                ->orWhere('route_delete', $currentPath);
        })->first();
    }
}
