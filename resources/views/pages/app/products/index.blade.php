@extends('layouts.app.main')

@section('titlepage')
    Produtos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Produtos</li>
@endsection

@section('contentpage')
    <div class="row match-height pe-0">
        <div class="col-xl-12 col-md-12 col-12 pe-0">
            <form action="{{ route('products.index') }}" method="GET">
                <div class="card collapse" id="collapseFilter">
                    <div class="card-body">
                        <span class="fw-bolder">Filtros</span>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div>
                                    <label class="form-label" for="name">Nome</label>
                                    <input id="name" name="name" class="form-control" type="text"
                                        placeholder="Filtrar por nome" value="{{ request()->input('name') }}" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end pe-2">
                                <button class="btn btn-primary btn-sm" type="submit"> <i class="fas fa-search"></i>
                                    Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body px-0">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end gap-1 pe-3">
                            <a class="btn btn-warning btn-sm mb-1 ms-1" href="{{ url()->current() }}"> <i
                                    class="fas fa-eraser"></i> Limpar</a>
                            <a class="btn btn-success btn-sm mb-1" data-bs-toggle="collapse" href="#collapseFilter"
                                role="button" aria-expanded="false" aria-controls="collapseFilter">
                                <i class="fas fa-filter"></i>
                                Filtros
                            </a>
                            <a class="btn btn-primary btn-sm mb-1" href="{{ route('products.create') }}"> <i
                                    class="fas fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>
                    <div class="table-responsive p-2" style="height: 400px">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-start" scope="col">#</th>
                                    <th class="text-start" scope="col">Miniaturas</th>
                                    <th class="text-start" scope="col">Nome</th>
                                    <th class="text-start" scope="col">Estoque</th>
                                    <th class="text-start" scope="col">Vendas</th>
                                    <th class="text-start" scope="col">Preço</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="text-start">{{ $product->id }}</td>
                                        <td>
                                            <div class="avatar-group">
                                                @foreach ($product->photos->take(3) as $photo)
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar pull-up my-0">
                                                        <img src="{{ url('storage/' . $photo->photo_path) }}" alt="Avatar"
                                                            height="26" width="26" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="text-start">{{ $product->name }}</td>
                                        <td>
                                            @if ($product->available_quantity == 0)
                                                <span class="badge rounded-pill badge-light-danger me-1">Sem estoque</span>
                                            @else
                                                <span
                                                    class="badge rounded-pill badge-light-info me-1">{{ $product->available_quantity }}
                                                    - unidades</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->stock - $product->available_quantity == 0)
                                                <span class="badge rounded-pill badge-light-secondary me-1">Nenhuma
                                                    venda</span>
                                            @else
                                                <span
                                                    class="badge rounded-pill badge-light-success me-1">{{ $product->stock - $product->available_quantity }}
                                                    - unidades</span>
                                            @endif
                                        </td>
                                        <td><span
                                                class="badge rounded-pill badge-light-success me-1">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item small"
                                                            href="{{ route('products.show', $product) }}">Visualizar</a>
                                                    </li>
                                                    <li><a class="dropdown-item small"
                                                            href="{{ route('products.edit', $product) }}">Editar</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">
                                            <i class="fas fa-circle-exclamation"></i>
                                            Nenhum produto cadastrado!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-1 p-1">
                    {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerpage')
@endsection
