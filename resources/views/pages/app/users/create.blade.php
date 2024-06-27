@extends('layouts.app.main')

@section('titlepage')
    Cadastrar Usuário 
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
    <li class="breadcrumb-item active">Cadastrar Usuário</li>
@endsection

@section('contentpage')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
        
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="name">Nome</label>
                                    <input id="name" name="name" class="form-control" type="text" placeholder="Nome do usuário" value="{{ old('name') }}"/>
                                    <x-input-error :messages="$errors->get('name')"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="email">E-mail</label>
                                    <input id="email" name="email" class="form-control" type="email" placeholder="E-mail do usuário" value="{{ old('email') }}"/>
                                    <x-input-error :messages="$errors->get('email')"/>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="cpf">CPF</label>
                                    <input id="cpf" name="cpf" class="form-control" type="text" placeholder="CPF do usuário" value="{{ old('cpf') }}"/>
                                    <x-input-error :messages="$errors->get('cpf')"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="cellphone">Celular</label>
                                    <input id="cellphone" name="cellphone" class="form-control" type="text" placeholder="Celular do usuário" value="{{ old('cellphone') }}"/>
                                    <x-input-error :messages="$errors->get('cellphone')"/>
                                       
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="role">Perfil</label>
                                    <select class="select2 form-select" id="role" name="role">
                                        <option value="" disabled selected>Selecione...</option>
                                        <option value="Admin" {{ old('role') == "Admin" ? 'selected' : ''}}>Admin</option>
                                        <option value="manage" {{ old('role') == "manage" ? 'selected' : ''}}>Gerente</option>
                                        <option value="user" {{ old('role') == "user" ? 'selected' : ''}}>Usuário</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('role')"/>
                                </div>
                            </div>
                           
                            <div class="col-12"></div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="password">Senha</label>
                                <div class="input-group form-password-toggle input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="*********" />
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye"></i>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password')"/>
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label" for="password_confirmation">Confirmar senha</label>
                                <div class="input-group form-password-toggle input-group-merge">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="*********" />
                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')"/>
                            </div>   
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-end gap-1">
                                <a class="btn btn-warning btn-sm" href="{{ route('users.index') }}"> <i class="fas fa-arrow-left"></i> Voltar</a>
                                <button class="btn btn-primary btn-sm" type="submit"> <i class="fas fa-check"></i> Confirmar</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('footerpage')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('#cellphone').mask('(00) 00000-0000');
        $('#cpf').mask('000.000.000-00');
    });
</script>
@endsection