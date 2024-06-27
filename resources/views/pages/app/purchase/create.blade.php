@extends('layouts.app.main')

@section('titlepage')
    Detalhes do Produto
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('purchase.index') }}">Comprar produtos</a></li>
    <li class="breadcrumb-item active">Detalhes do Produto</li>
@endsection

@section('contentpage')
    <div class="row match-height pe-0">
        <section class="app-ecommerce-details">
            <div class="card">
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col-12 col-md-5 mb-2 mb-md-0">
                            <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($product->photos as $key => $photo)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ url('storage/' . $photo->photo_path) }}" class="d-block w-100"
                                                style="height: 400px!important" alt="Product Image">
                                        </div>
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
                            <h4>{{ $product->name }}</h4>
                            <span class="card-text item-company">Comprar <a href="#"
                                    class="company-name">{{ $product->brand }}</a></span>
                            <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                <h4 class="item-price me-1">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</h4>
                            </div>
                            <p class="card-text">Disponibilidade: <span class="{{ $product->available_quantity == 0 ? 'text-danger' : 'text-success' }}">{{ $product->available_quantity == 0 ? 'Indisponível' : 'Em estoque' }}</span></p>
                            <p class="card-text">Quantidade em estoque: <span id="available_quantity" class="{{ $product->available_quantity == 0 ? 'text-danger' : 'text-success' }}">{{ $product->available_quantity }}</span></p>
                            <p class="card-text">{{ $product->description }}</p>
                            <ul class="product-features list-unstyled">
                                <li><i data-feather="shopping-cart"></i> <span>Frete grátis</span></li>
                                <li><i data-feather="dollar-sign"></i> <span>Opções de parcelamento disponíveis</span></li>
                            </ul>
                            <hr />
                            <form action="{{ route('sales.store') }}" method="POST" id="purchaseForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">

                                <div class="row">
                                    <div class="mb-3 col-8">
                                        <label for="client" class="form-label">Selecione o cliente</label>
                                        <select class="form-select" id="client" name="client_id" required>
                                            <option value="">Selecione um cliente...</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('client_id')" />
                                    </div>
                                    
                                    <div class="mb-3 col-4">
                                        <label for="quantity" class="form-label">Quantidade</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            value="1" min="1" required>
                                        <x-input-error :messages="$errors->get('quantity')" />
                                    </div>

                                    <div class="mb-3 col-8">
                                        <label class="form-label">Total</label>
                                        <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{ old('total_amount', number_format($product->price, 2, ',', '')) }}" readonly>
                                    </div>
                                    
                                </div>
                                <div class="d-flex flex-column flex-sm-row pt-1">
                                    <a class="btn btn-danger btn-cart me-0 me-sm-1 mb-1 mb-sm-0" href="{{ route('purchase.index') }}"> <i
                                        class="fas fa-arrow-left"></i> Voltar</a>
                                    <button type="submit" class="btn btn-success btn-cart me-0 me-sm-1 mb-1 mb-sm-0" id="addToCartButton">
                                        <i data-feather="shopping-cart" class="me-50"></i>
                                        <span class="add-to-cart">Comprar</span>
                                    </button>
                                </div>
                            </form>
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
            $('#quantity').on('input', function() {
                var quantity = parseInt($(this).val());
                var availableQuantity = parseInt($('#available_quantity').text());

                if (quantity > availableQuantity) {
                    $('#addToCartButton').prop('disabled', true);
                } else {
                    $('#addToCartButton').prop('disabled', false);
                }

                var price = {{ $product->price }};
                var total = quantity * price;
                $('#total_amount').val(total.toFixed(2).replace('.', ','));
            });
        });
    </script>
@endsection
