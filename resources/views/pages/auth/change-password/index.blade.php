@extends('layouts.auth.main')
@section('titlepage')
    Alterar senha 
@endsection
@section('contentpage')

    <section>
        <h2 class="card-title fw-bold mb-1 text-center">Alterar senha</h2>
        <p class="card-text mb-2 text-center">A nova senha deve ser diferente das senhas usadas anteriormente.</p>
        <form class="auth-reset-password-form mt-2" action="{{ route('change-password') }}" method="POST">
            @csrf
            <div class="mb-1">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="current_password">Senha Atual</label>
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="current_password" type="password" name="current_password" placeholder="***************" aria-describedby="current_password" autofocus="" tabindex="1" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
                <x-input-error :messages="$errors->get('current_password')"/>
            </div>
            <div class="mb-1">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Nova Senha</label>
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="***************" aria-describedby="password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
                <x-input-error :messages="$errors->get('password')"/>
            </div>
            <div class="mb-1">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password_confirmation">Confirmar Nova Senha</label>
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="password_confirmation" type="password" name="password_confirmation" placeholder="***************" aria-describedby="password_confirmation" tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')"/>
            </div>
            <button class="btn btn-primary w-100" tabindex="3">Confirmar</button>
        </form>
        <p class="text-center mt-2"><a href="{{ route('login') }}"><i data-feather="chevron-left"></i> Voltar ao Login</a></p>
    </section>

@endsection