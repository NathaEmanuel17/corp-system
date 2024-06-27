<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(protected User $user)
    {
        parent::__construct($user);
    }

    public function blockOrUnblock($user)
    {
        $user = $this->obj->find($user->id);

        if (empty($user->blocked_at)) {
            return $user->update(['blocked_at' => date('Y-m-d H:i:s')]);
        }

        return $user->update(['blocked_at' => null]);;
    }

    
}
