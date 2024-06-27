<?php

namespace App\Services;

class RoleTranslationService
{
    protected $roles = [
        'admin' => 'Administrador',
        'manage' => 'Gerente',
        'user' => 'Usuário',
    ];

    /**
     * Translate the given role.
     *
     * @param string $role
     * @return string
     */
    public function translate($role)
    {
        return $this->roles[$role] ?? $role;
    }
}
