@extends('layouts.app.main')

@section('titlepage')
    Vendas
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Vendas</li>
@endsection

@section('contentpage')
    <div class="row match-height pe-0">
        <div class="col-xl-12 col-md-12 col-12 pe-0">
            <form action="{{ route('sales.index') }}" method="GET">
                <div class="card collapse" id="collapseFilter">
                    <div class="card-body">
                        <span class="fw-bolder">Filtros</span>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="client" class="form-label">Cliente</label>
                                <select class="form-select" id="client" name="client" required>
                                    <option value="">Selecione um cliente...</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"
                                            {{ request()->input('client') == $client->id ? 'selected' : '' }}>
                                            {{ $client->name }}</option>
                                    @endforeach
                                </select>
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
            <div class="row match-height">
                <!-- Medal Card -->
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card card-congratulation-medal">
                        <div class="card-body">
                            <h5>{{ $bestSellingProduct['product_name'] ?? '' }} 🎉!</h5>
                            <p class="card-text font-small-3">Item com maior quantidade vendida</p>
                            <h3 class="mb-75 mt-2 pt-50">
                                <a href="#">{{ $bestSellingProduct['total_sold'] ?? '' }} vendidos </a>
                            </h3>
                            <a href="{{ route('products.show', $bestSellingProduct['product_id'] ?? '') }}"
                                class="btn btn-success">Olhar produto</a>
                            <img src="{{ url('assets//images/illustration/badge.svg') }}" class="congratulation-medal"
                                alt="Medal Pic" />
                        </div>
                    </div>
                </div>
                <!--/ Medal Card -->

                <!-- Statistics Card -->
                <div class="col-xl-8 col-md-6 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Estatistica</h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text font-small-2 me-25 mb-0">Dados quantitativos</p>
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-primary me-2">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $totalProductsSold ?? '' }}</h4>
                                            <p class="card-text font-small-3 mb-0">vendas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-info me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $totalClients ?? '' }}</h4>
                                            <p class="card-text font-small-3 mb-0">clientes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-danger me-2">
                                            <div class="avatar-content">
                                                <i data-feather="box" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $totalProductsRegistered ?? '' }}</h4>
                                            <p class="card-text font-small-3 mb-0">Produtos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-success me-2">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">${{ $totalSalesValue ?? '' }}</h4>
                                            <p class="card-text font-small-3 mb-0">Total</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Card -->
            </div>
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
                            <form action="{{ route('sales.report') }}" method="POST" class="mb-1">
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-file-alt"></i> Gerar
                                    Relatório</button>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive p-2" style="height: 400px">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-start" scope="col">#</th>
                                    <th class="text-start" scope="col">Cliente</th>
                                    <th class="text-start" scope="col">Produto</th>
                                    <th class="text-start" scope="col">(Un) Estoque</th>
                                    <th class="text-start" scope="col">Vendas</th>
                                    <th class="text-start" scope="col">Preço unidade</th>
                                    <th class="text-start" scope="col">Preço total</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales as $sale)
                                    <tr>
                                        <td class="text-start">{{ $sale->id }}</td>
                                        <td class="text-start">{{ $sale->client->name }}</td>
                                        <td class="text-start">
                                            @foreach ($sale->items as $item)
                                                {{ $item->product->name }}<br>
                                            @endforeach
                                        </td>
                                        <td class="text-start">
                                            @foreach ($sale->items as $item)
                                            <span
                                            class="badge rounded-pill badge-light-info me-1"> {{ $item->product->stock - $item->quantity }} -
                                            unidades</span>
                                                
                                            @endforeach
                                        </td>
                                        <td class="text-start">
                                            @foreach ($sale->items as $item)
                                                <span
                                                    class="badge rounded-pill badge-light-success me-1">{{ $item->quantity }}-
                                                    unidades</span>
                                            @endforeach
                                        </td>
                                        <td class="text-start">
                                            @foreach ($sale->items as $item)
                                                {{ 'R$ ' . number_format($item->price, 2, ',', '.') }}<br>
                                            @endforeach
                                        </td>
                                        <td class="text-start">
                                            {{ 'R$ ' . number_format($sale->total_amount, 2, ',', '.') }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item small"
                                                            href="{{ route('sales.show', $sale) }}">Visualizar</a></li>
                                                    <li><a class="dropdown-item small"
                                                            href="{{ route('sales.edit', $sale) }}">Editar</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">
                                            <i class="fas fa-circle-exclamation"></i>
                                            Nenhuma venda cadastrada!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="mt-1 p-1">
                    {{ $sales->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>

            </div>

        </div>
    </div>

@endsection
@section('footerpage')
@endsection
