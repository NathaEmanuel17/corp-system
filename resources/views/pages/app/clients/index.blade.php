@extends('layouts.app.main')

@section('titlepage')
Usuários
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Clientes</li>
@endsection

@section('contentpage')
<div class="row match-height pe-0">
    <div class="col-xl-12 col-md-12 col-12 pe-0">
        <form action="{{ route('clients.index') }}" method="GET">
            <div class="card collapse" id="collapseFilter">
                <div class="card-body">
                    <span class="fw-bolder">Filtros</span>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div>
                                <label class="form-label" for="name">Nome</label>
                                <input id="name" name="nome" class="form-control" type="text" placeholder="Filtrar por nome" value="{{ request()->input('name') }}" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div>
                                <label class="form-label" for="email">E-mail</label>
                                <input id="email" name="email" class="form-control" type="email" placeholder="Filtrar por e-mail" value="{{ request()->input('email') }}" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div>
                                <label class="form-label" for="cpf">CPF</label>
                                <input id="cpf" name="cpf" class="form-control" type="text" placeholder="Filtrar por CPF" value="{{ request()->input('cpf') }}" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end pe-2">
                            <button class="btn btn-primary btn-sm" type="submit"> <i class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end gap-1 pe-3">
                        <a class="btn btn-warning btn-sm mb-1 ms-1" href="{{ url()->current() }}"> <i class="fas fa-eraser"></i> Limpar</a>
                        <a class="btn btn-success btn-sm mb-1" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                            <i class="fas fa-filter"></i>
                            Filtros
                        </a>
                        <a class="btn btn-primary btn-sm mb-1" href="{{ route('clients.create') }}"> <i class="fas fa-plus"></i> Cadastrar</a>
                    </div>
                </div>
                <div class="table-responsive p-2" style="height: 400px">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-start" scope="col">ID</th>
                                <th class="text-start" scope="col">Nome</th>
                                <th class="text-start" scope="col">E-mail</th>
                                <th class="text-start" scope="col">Estado/Cidade</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $clients as $client )
                            <tr>
                                <td class="text-start">{{ $client->id }}</td>
                                <td class="text-start">{{ $client->name }}</td>
                                <td class="text-start">{{ Str::of($client->email)->mask('*', 10, -4) }}</td>
                                <td class="text-start">{{ $client->uf }} - {{$client->city}}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item small" href="{{ route('clients.show',$client) }}">Visualizar</a></li>
                                            <li><a class="dropdown-item small" href="{{ route('clients.edit',$client) }}">Editar</a></li>

                                        </ul>
                                    </div>
                
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">
                                    <i class="fas fa-circle-exclamation"></i>
                                    Nenhum cliente cadastrado!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="mt-1 p-1">
                {{ $clients->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
            </div>

        </div>

    </div>
</div>

@endsection
@section('footerpage')
@endsection
