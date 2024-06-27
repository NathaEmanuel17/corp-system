<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthService
{
    public function __construct(protected UserRepository $userRespository)
    {
        $this->userRespository = $userRespository;
    }

    public function login(array $loginRequest)
    {
        if (Auth::attempt(['email' => $loginRequest['email'], 'password' => $loginRequest['password']])) {
     
            Session::regenerate();
            $user = Auth::user();

            $data = ['last_access' => now()];
            $this->userRespository->update($user->id, $data);

            if ( $user->change_password ){
                return redirect()->route('changePassword')
                ->with('message', 'Por favor, atualize sua senha!')
                ->with('type', 'warning');
            }
            toastr()->success('Olá novamente ', Auth::user()->name);
            return redirect()->route('sales.index');
        }
        else
        {
            return redirect()->route('login')
                ->with('message', 'E-mail ou senha incorretos.')
                ->with('type', 'danger');
        }
    }

    public function postChangePassword(array $changePasswordRequest)
    {
        $user = Auth::user();
        $data = ['password' => bcrypt($changePasswordRequest['password']), 'change_password' => false];
        $this->userRespository->update($user->id, $data);

        return redirect()->route('login')
            ->with('message', 'Senha atualizada, faça o login.')
            ->with('type', 'success');
    }


}
