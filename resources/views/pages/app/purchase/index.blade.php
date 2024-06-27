@extends('layouts.app.main')

@section('titlepage')
    Comprar produtos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Comprar produtos</li>
@endsection

@section('contentpage')
    <div class="content-body">
        <div class="row match-height pe-0">
            <!-- Filtros -->
            <div class="col-xl-3 col-md-4 col-12">
                <form action="{{ route('purchase.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-bolder">Filtros</span>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <label class="form-label" for="name">Nome</label>
                                        <input id="name" name="name" class="form-control" type="text"
                                            placeholder="Filtrar por nome" value="{{ request()->input('name') }}" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <a class="btn btn-warning btn-sm me-1" href="{{ url()->current() }}"> <i
                                            class="fas fa-eraser"></i> Limpar</a>
                                    <button class="btn btn-primary btn-sm" type="submit"> <i class="fas fa-search"></i>
                                        Buscar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Produtos -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="row row-cols-1 row-cols-md-3 g-4" id="ecommerce-products">
                    @forelse ($products as $product)
                        <div class="col">
                            <div class="card ecommerce-card">
                                <div class="item-img text-center card-header">
                                    <img src="{{ url('storage/' . $product->photos->first()->photo_path) }}"
                                        class="img-fluid" style="height: 250px!important; width: 100%"
                                        alt="Imagem do Produto">
                                </div>
                                <div class="card-body">
                                    <div class="item-wrapper">
                                        <div>
                                            <h6 class="item-price text-primary">
                                                {{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                    <h6 class="item-name">
                                        <a class="text-body">{{ $product->name }} <span
                                                class="{{ $product->available_quantity == 0 ? 'text-danger' : 'text-success' }}">{{ $product->available_quantity == 0 ? 'Indisponível' : 'Em estoque' }}</span></a>
                                    </h6>
                                    <p class="card-text item-description">
                                        <strong>Descrição:</strong> {{ Str::limit($product->description, 10) }}...
                                    </p>
                                    <p class="card-text"><strong>Estoque:</strong> {{ $product->available_quantity }}
                                        unidades</p>
                                </div>
                                <div class="item-options text-center">
                                    <a href="{{ route('purchase.show', $product) }}" class="btn btn-primary mb-1">
                                        <i data-feather="shopping-cart"></i>
                                        <span class="add-to-cart">Visualizar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="fas fa-circle-exclamation"></i>
                                    Nenhum produto cadastrado!
                                </div>
                            </div>
                        </div>
                    @endforelse
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
