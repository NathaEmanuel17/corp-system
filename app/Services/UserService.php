<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected RoleTranslationService $roleTranslationService;
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository, RoleTranslationService $roleTranslationService)
    {
        $this->userRepository = $userRepository;
        $this->roleTranslationService = $roleTranslationService;
    }

    public function paginate(int $perPage, array $filters = [])
    {
        $filteredFilters = FilterService::filter($filters, [
            'bloqueado' => 'blocked_at',
        ]);

        $paginatedUsers = $this->userRepository->paginate($perPage, $filteredFilters);

        $paginatedUsers->getCollection()->transform(function ($user) {
            $user->role = $this->roleTranslationService->translate($user->role);
            return $user;
        });

        return $paginatedUsers;
    }

    public function store(array $storeUserRequest)
    {
        
        $this->userRepository->store($storeUserRequest);

        return redirect()->route('users.index')
            ->with('message', 'Usuário cadastrado com sucesso!')
            ->with('type', 'success');
    }

    public function update(int $userId, array $updateUserRequest)
    {
        $user = $this->userRepository->find($userId);

        if (isset($updateUserRequest['password'])) {
            $updateUserRequest['password'] = bcrypt($updateUserRequest['password']);
        } else {
            unset($updateUserRequest['password']);
        }

        if (isset($updateUserRequest['photo'])) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            $path = $updateUserRequest['photo']->store('photo', 'public');

            unset($updateUserRequest['photo']);
            $updateUserRequest['photo'] = $path;
        }

        $this->userRepository->update($userId, $updateUserRequest);

        return redirect()->back()
            ->with('message', 'Usuário editado com sucesso!')
            ->with('type', 'success');
    }

    public function blockOrUnblock(object $user)
    {
        $this->userRepository->blockOrUnblock($user);

        $text = empty($user->blocked_at) ? ' bloqueado ' : ' desbloqueado ';

        return redirect()->route('users.index')
            ->with('message', 'Usuário ' . $text . ' com sucesso!')
            ->with('type', 'success');
    }
}
