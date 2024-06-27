@extends('layouts.auth.main')
@section('titlepage')
    Login 
@endsection
@section('contentpage')

    <section>
        <h2 class="card-title fw-bold mb-1 text-center">Processo Seletivo - Corpsystem</h2>
        <p class="card-text mb-2 text-center">Por favor insira seus dados de acesso para continuar.</p>
        <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-1">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" type="text" name="email" placeholder="iapa@example.com" aria-describedby="email" autofocus="" tabindex="1" value="{{ old('email') }}"/>
                <x-input-error :messages="$errors->get('email')"/>
            </div>
            <div class="mb-1">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Senha</label>
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="***************" aria-describedby="password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
                <x-input-error :messages="$errors->get('password')"/>
            </div>
            <button class="btn btn-success w-100" tabindex="4">Acessar</button>
        </form>
    </section>

@endsection