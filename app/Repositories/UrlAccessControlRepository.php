<?php

namespace App\Repositories;

use App\Models\UrlAccessControl;

class UrlAccessControlRepository extends BaseRepository
{
    public function __construct(protected UrlAccessControl $urlAccessControl)
    {
        parent::__construct($urlAccessControl);
    }

    public function findPermission(int $menuId, string $role): ?UrlAccessControl
    {
        return $this->obj->where('menu_id', $menuId)
            ->where('role', $role)
            ->first();
    }
}
