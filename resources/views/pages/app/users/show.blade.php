@extends('layouts.app.main')

@section('titlepage')
    Visualizar Usuário 
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
    <li class="breadcrumb-item active">Visualizar Usuário</li>
@endsection

@section('contentpage')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div>
                                <label class="form-label" for="name">Nome</label>
                                <input id="name" name="name" class="form-control" type="text" placeholder="Nome do usuário" value="{{ $user->name }}" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div>
                                <label class="form-label" for="email">E-mail</label>
                                <input id="email" name="email" class="form-control" type="email" placeholder="E-mail do usuário" value="{{ $user->email }}" readonly/>
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-12">
                            <div>
                                <label class="form-label" for="document_cpf">CPF</label>
                                <input id="document_cpf" name="document_cpf" class="form-control" type="text" placeholder="CPF do usuário" value="{{ $user->document_cpf }}" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div>
                                <label class="form-label" for="cellphone">Celular</label>
                                <input id="cellphone" name="cellphone" class="form-control" type="text" placeholder="Celular do usuário" value="{{ $user->cellphone }}" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div>
                                <label class="form-label" for="role">Perfil</label>
                                <select class="select2 form-select" id="role" name="role" disabled>
                                    <option value="{{ $user->role }}">{{ $user->role }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end gap-1">
                            <a class="btn btn-warning btn-sm" href="{{ route('users.index') }}"> <i class="fas fa-arrow-left"></i> Voltar</a>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</section>
@endsection