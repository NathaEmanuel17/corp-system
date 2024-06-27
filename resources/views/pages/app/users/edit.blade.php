@extends('layouts.app.main')

@section('titlepage')
    Editar Usuário 
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
    <li class="breadcrumb-item active">Editar Usuário</li>
@endsection

@section('contentpage')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update',$user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="name">Nome</label>
                                    <input id="name" name="name" class="form-control" type="text" placeholder="Nome do usuário" value="{{ isset($user) ? $user->name : old('name') }}"/>
                                    <x-input-error :messages="$errors->get('name')"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="email">E-mail</label>
                                    <input id="email" name="email" class="form-control" type="email" placeholder="E-mail do usuário" value="{{ isset($user) ? $user->email : old('email') }}"/>
                                    <x-input-error :messages="$errors->get('email')"/>
                                </div>
                            </div>
                     
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="cpf">CPF</label>
                                    <input id="cpf" name="cpf" class="form-control" type="text" placeholder="CPF do usuário" value="{{ isset($user) ? $user->cpf : old('cpf') }}"/>
                                    <x-input-error :messages="$errors->get('cpf')"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="cellphone">Celular</label>
                                    <input id="cellphone" name="cellphone" class="form-control" type="text" placeholder="Celular do usuário" value="{{ isset($user) ? $user->cellphone : old('cellphone') }}"/>
                                    <x-input-error :messages="$errors->get('cellphone')"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div>
                                    <label class="form-label" for="role">Perfil</label>
                                    <select class="select2 form-select" id="role" name="role">
                                        <option value="" disabled selected>Selecione...</option>
                                        <option value="admin" @if($user->role == "admin") selected @endif>Admin</option>
                                        <option value="manage" @if($user->role == "manage") selected @endif>Gerente</option>
                                        <option value="user" @if($user->role == "user") selected @endif>Usuário</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('role')"/>
                                </div>
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