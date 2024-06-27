@extends('layouts.app.main')

@section('titlepage')
    Visualizar venda
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Vendas</a></li>
    <li class="breadcrumb-item active">Visualizar venda</li>
@endsection

@section('contentpage')
<div class="row match-height pe-0">
    <section id="multiple-column-form">
        <div class="col-xl-12 col-md-12 col-12 pe-0">
            <div class="card">
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col-12 col-md-5 mb-2 mb-md-0">
                            <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($sale->items as $item)
                                        @foreach ($item->product->photos->take(3) as $key => $photo)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img src="{{ url('storage/' . $photo->photo_path) }}" class="d-block w-100"
                                                    style="height: 400px!important" alt="Product Image {{ $key + 1 }}">
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#product-carousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Voltar</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#product-carousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Próximo</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <h4>Venda #{{ $sale->id }}</h4>
                            <h4><strong>Produto: </strong>{{ $sale->items->first()->product->name }}</h4>
                            <span class="card-text item-company"><strong>Cliente: </strong> <a href="#">{{ $sale->client->name }}</a></span>
                            <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                <h4 class="item-price me-1">{{ 'Total: R$ ' . number_format($sale->total_amount, 2, ',', '.') }}</h4>
                            </div>
                            <p class="card-text">Data da venda: {{ $sale->created_at->format('d/m/Y H:i:s') }}</p>
                            <ul class="product-features list-unstyled">
                                <li><i data-feather="shopping-cart"></i> <span>Itens da Venda</span></li>
                                <li>
                                    <ul>
                                        @foreach ($sale->items as $item)
                                            <li>{{ $item->quantity }} x {{ $item->product->name }} - {{ 'R$ ' . number_format($item->price, 2, ',', '.') }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('footerpage')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#product-carousel').carousel();
    });
</script>
@endsection
