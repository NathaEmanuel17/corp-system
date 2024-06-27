@extends('layouts.app.main')

@section('titlepage')
Usuários
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Usuários</li>
@endsection

@section('contentpage')
<div class="row match-height pe-0">
    <div class="col-xl-12 col-md-12 col-12 pe-0">
        <form action="{{ route('users.index') }}" method="GET">
            <div class="card collapse" id="collapseFilter">
                <div class="card-body">
                    <span class="fw-bolder">Filtros</span>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div>
                                <label class="form-label" for="name">Nome</label>
                                <input id="name" name="name" class="form-control" type="text" placeholder="Filtrar por nome" value="{{ request()->input('name') }}" />
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
                    
                    <div class="row mt-2">
                        <div class="col-md-3 col-12">
                            <div>
                                <label class="form-label" for="bloqueado">Bloqueado</label>
                                <select class="select2 form-select" id="bloqueado" name="bloqueado">
                                    <option value="" disabled @if(request()->input('bloqueado') === null) selected @endif>Selecione...</option>
                                    <option value="true" @if(request()->input('bloqueado') === 'true') selected @endif>Sim</option>
                                    <option value="false" @if(request()->input('bloqueado') === 'false') selected @endif>Não</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div>
                                <label class="form-label" for="role">Perfil</label>
                                <select class="select2 form-select" id="role" name="role">
                                    <option value="" disabled @if(request()->input('role') === null) selected @endif>Selecione...</option>
                                    <option value="Admin" @if(request()->input('role') === 'Admin') selected @endif>Admin</option>
                                    <option value="manage" @if(request()->input('role') === 'manage') selected @endif>Gerente</option>
                                    <option value="user" @if(request()->input('role') === 'user') selected @endif>Usuário</option>
                                </select>
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
                        <a class="btn btn-primary btn-sm mb-1" href="{{ route('users.create') }}"> <i class="fas fa-plus"></i> Cadastrar</a>
                    </div>
                </div>
                <div class="table-responsive p-2" style="height: 400px">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-start" scope="col">ID</th>
                                <th class="text-start" scope="col">Foto</th>
                                <th class="text-start" scope="col">Nome</th>
                                <th class="text-start" scope="col">E-mail</th>
                                <th class="text-start" scope="col">Perfil</th>
                                <th class="text-start" scope="col">Bloqueado</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $users as $user )
                            <tr>
                                <td class="text-start">{{ $user->id }}</td>
                                <td>
                                    <div class="avatar-group">
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar pull-up my-0" title="{{$user->name}}">
                                            <img src="{{ $user->photo ? url('storage/' . $user->photo) : url('assets/images/logo/no-logo.png') }}" alt="Avatar" height="26" width="26" />
                                        </div>
                                       
                                    </div>
                                </td>
                                <td class="text-start">{{ $user->name }}</td>
                                <td class="text-start">{{ Str::of($user->email)->mask('*', 10, -4) }}</td>
                                <td class="text-start">{{ $user->role }}</td>
                                <td class="text-start">{!! isset($user->blocked_at) ? '&#x1F534; Sim' : '&#x1F7E2; Não' !!}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item small" href="{{ route('users.show',$user) }}">Visualizar</a></li>
                                            <li><a class="dropdown-item small" href="{{ route('users.edit',$user) }}">Editar</a></li>
                                            <li>
                                                <form id="blockUserForm_{{ $user->id }}" action="{{ route('users.block',$user) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                                <a class="dropdown-item small" href="#" onclick="event.preventDefault(); confirmBlockUser(event, {{ $user->id }});">
                                                    {{ isset($user->blocked_at) ? 'Desbloquear' : 'Bloquear' }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">
                                    <i class="fas fa-circle-exclamation"></i>
                                    Nenhum usuário cadastrado!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="mt-1 p-1">
                {{ $users->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
            </div>

        </div>

    </div>
</div>

<script>
    function confirmBlockUser(event, userId) {
        event.preventDefault();

        var isBlocked = event.currentTarget.getAttribute('data-blocked') === 'true';
        var message = isBlocked ? "Este usuário já está bloqueado! Realmente quer desbloqueá-lo?" : "Tem certeza que deseja bloquear este usuário?";

        Swal.fire({
            icon: "warning",
            title: "Atenção",
            text: message,
            showCancelButton: true,
            confirmButtonText: isBlocked ? "Sim, quero desbloquear!" : "Sim, bloquear!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('blockUserForm_' + userId).submit();
            }
        });
    }

    function checkFormFields() {
        var form = document.querySelector('form');
        var inputs = form.querySelectorAll('input, select');

        for (var i = 0; i < inputs.length; i++) {
            var value = inputs[i].value.trim();

            if (value !== '') {
                var collapse = document.getElementById('collapseFilter');
                collapse.classList.add('show');
                return;
            }
        }
    }

    window.addEventListener('DOMContentLoaded', checkFormFields);
</script>

@endsection
@section('footerpage')
@endsection
