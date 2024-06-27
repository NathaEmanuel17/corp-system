@extends('layouts.app.main')
@section('titlepage')
menus
@endsection
@section('headerpage')

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">menus </li>
@endsection

@section('contentpage')
<section id="multiple-column-form">
    <div class="row">
        <!-- Formulário -->
        <div class="col-md-6 col-12 d-flex">
            <div class="card flex-fill h-100">
                <div class="card-header">
                    <h4 class="card-title">Cadastro de Rotas</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="POST" action="{{ route('menus.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">Nome do menu</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="menu"></i></span>
                                        <input type="text" id="name" class="form-control" name="name" placeholder=" Nome do menu" value="{{ old('name') }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="route_get">Nome do rota GET</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="git-pull-request"></i></span>
                                        <input type="text" id="route_get" class="form-control" name="route_get" placeholder="/route_get" value="{{ old('route_get') }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('route_get')" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="route_post">Nome do rota POST</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="git-pull-request"></i></span>
                                        <input type="text" id="route_post" class="form-control" name="route_post" placeholder="/route_post" value="{{ old('route_post') }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('route_post')" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="route_put">Nome do rota PUT</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="git-pull-request"></i></span>
                                        <input type="text" id="route_put" class="form-control" name="route_put" placeholder="/route_put/{id}" value="{{ old('route_put') }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('route_put')" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="route_delete">Nome do rota Delete</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="git-pull-request"></i></span>
                                        <input type="text" id="route_delete" class="form-control" name="route_delete" placeholder="/route_delete/{id}" value="{{ old('route_delete') }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('route_delete')" />
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Confirmar</button>
                                <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12 d-flex">
            <div class="card flex-fill h-100">
                <div class="card-header">
                    <h4 class="card-title">Menus</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive mb-2" style="max-height: 300px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-start">Nome</th>
                                    <th class="text-center">Status</th>
                                    <th class="cell-fit">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                <tr>
                                    <td class="text-start">{{ Str::limit($menu->name, 10) }}</td>

                                    <td class="text-nowrap text-center">
                                        {!! !empty($menu->deleted_at) ? '&#x1F534;' : '&#x1F7E2;' !!}
                                    </td>


                                    <td class="justify-content-center">
                                        <a class="btn btn-primary btn-sm text-nowrap" href="{{ route('menus.edit', $menu->id) }}">
                                            <i data-feather="edit"></i> Editar
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $menus->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12 mt-2 d-flex">
            <div class="card flex-fill h-100">
                <div class="card-header">
                    <h4 class="card-title">Controle de acessos</h4>
                </div>
                <div class="card-body">
                    @foreach ($urlAccessControl as $menu)
 
                    <div class="mt-1">
                        <h4 class="form-label">{{ $menu->name }}</h4>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Tipo de Usuário</th>
                                <th class="text-center">Criar</th>
                                <th class="text-center">Ler</th>
                                <th class="text-center">Atualizar</th>
                                <th class="text-center">Excluir</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu->urlAccessControl as $urlAccessControl)
                            <form class="needs-validation" method="POST" action="{{ route('url.access.control.update', ['id' => $urlAccessControl->id]) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="menu_id" value="{{ $urlAccessControl->menu_id }}">

                                <tr>
                                    <td class="text-center">{{ $urlAccessControl->role }}</td>
                                    <td class="text-center">
                                        <input type="hidden" name="can_create" value="0">
                                        <input class="form-check-input" type="checkbox" name="can_create" value="1"  {{ $urlAccessControl->can_create ? 'checked' : '' }}>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="can_read" value="0">
                                        <input class="form-check-input" type="checkbox" name="can_read" value="1"  {{ $urlAccessControl->can_read ? 'checked' : '' }}>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="can_update" value="0">
                                        <input class="form-check-input" type="checkbox" name="can_update" value="1"  {{ $urlAccessControl->can_update ? 'checked' : '' }}>
                                    </td>
                                    <td class="text-center">
                                        <input type="hidden" name="can_delete" value="0">
                                        <input class="form-check-input" type="checkbox" name="can_delete" value="1"  {{ $urlAccessControl->can_delete ? 'checked' : '' }}>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('footerpage')
<!-- BEGIN: Page JS-->

<!-- END: Page JS-->
@endsection