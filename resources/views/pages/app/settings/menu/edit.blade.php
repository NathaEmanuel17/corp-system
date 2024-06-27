@extends('layouts.app.main')
@section('titlepage')
menus
@endsection
@section('headerpage')

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('manage.access.permissions.index') }}">Menus</a></li>
<li class="breadcrumb-item active" aria-current="page">Editar menu: {{$menu->name}}</a></li>
@endsection

@section('contentpage')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('manage.access.permissions.index') }}" class="btn btn-outline-primary">
                        Voltar
                    </a>
                    <h4 class="card-title">Editar menu</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="POST" action="{{ route('menus.update', $menu->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="name">Nome da Rota</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="menu"></i></span>
                                        <input {{ $menu->deleted_at ? 'disabled' : '' }} type="text" id="name" class="form-control" name="name" placeholder=" Nome" value="{{ old('name', $menu->name) }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('name')" />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="route_get">Nome da rota GET</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="git-pull-request"></i></span>
                                        <input {{ $menu->deleted_at ? 'disabled' : '' }} type="text" id="route_get" class="form-control" name="route_get" placeholder="{/route_get}" value="{{ old('route_get', $menu->route_get) }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('route_get')" />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="route_post">Nome da rota POST</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="git-pull-request"></i></span>
                                        <input {{ $menu->deleted_at ? 'disabled' : '' }} type="text" id="route_post" class="form-control" name="route_post" placeholder="/route_post" value="{{ old('route_post', $menu->route_post) }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('route_post')" />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="route_put">Nome da rota PUT</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="git-pull-request"></i></span>
                                        <input {{ $menu->deleted_at ? 'disabled' : '' }} type="text" id="route_put" class="form-control" name="route_put" placeholder="/route_put/{id}" value="{{ old('route_put', $menu->route_put) }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('route_put')" />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="route_delete">Nome da rota Delete</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i data-feather="git-pull-request"></i></span>
                                        <input {{ $menu->deleted_at ? 'disabled' : '' }} type="text" id="route_delete" class="form-control" name="route_delete" placeholder="route_delete/{id}" value="{{ old('route_delete', $menu->route_delete) }}" />
                                    </div>
                                    <x-input-error :messages="$errors->get('route_delete')" />
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light" {{ $menu->deleted_at ? 'disabled' : '' }}>
                                    Atualizar
                                </button>
                                <button type="button" class="btn {{ $menu->deleted_at ? 'btn-success' : 'btn-danger' }} me-1" data-bs-toggle="modal" data-bs-target="#danger">
                                    {{ $menu->deleted_at ? 'Ativar menu' : 'Desativar menu' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<x-modal-delete :id="$menu->id" :action="route('menus.destroy', $menu->id)" :status="$menu->deleted_at" />
@endsection

@section('footerpage')
<!-- BEGIN: Page JS-->

<!-- END: Page JS-->
@endsection