@extends('layouts.app.main')

@section('titlepage')
    Editar venda
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('sales.index') }}">Vendas</a></li>
    <li class="breadcrumb-item active">Editar venda</li>
@endsection

@section('contentpage')
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
                            <span class="card-text item-company"><strong>Cliente: </strong> <a
                                    href="{{ route('clients.show', $sale->client->id) }}">{{ $sale->client->name }}</a></span>
                            <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                <h4 class="item-price me-1" id="totalAmount">Total: R$
                                    {{ number_format($sale->total_amount, 2, ',', '.') }}</h4>
                            </div>
                            <p class="card-text">Data da venda: {{ $sale->created_at->format('d/m/Y H:i:s') }}</p>
                            <ul class="product-features list-unstyled">
                                <li><i data-feather="shopping-cart"></i> <span>Itens da Venda</span></li>
                                <li>
                                    <ul>
                                        @foreach ($sale->items as $item)
                                            <li>{{ $item->quantity }} x {{ $item->product->name }} - R$
                                                {{ number_format($item->price, 2, ',', '.') }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>

                            <hr>

                            <form id="updateSaleForm" action="{{ route('sales.update', $sale->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <h5>Estoque: {{ $stock }} unidades</h5>
                                    <div class="col-md-6 col-12">
                                        <label for="client" class="form-label">Cliente</label>
                                        <select class="form-select" id="client" name="client_id" required>
                                            <option value="">Selecione um cliente...</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}"
                                                    {{ $sale->client_id == $client->id ? 'selected' : '' }}>
                                                    {{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('client_id')" />
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label for="quantity" class="form-label">Quantidade</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            value="{{ $sale->items->first()->quantity }}">
                                        <x-input-error :messages="$errors->get('quantity')" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6 col-12">
                                        <label for="totalAmountInput" class="form-label">Total da Venda</label>
                                        <input type="text" class="form-control" id="totalAmountInput" name="total_amount"
                                            value="{{ $sale->total_amount }}" readonly>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" id="submitButton">Salvar
                                            alterações</button>
                                        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#danger">
                                            Excluir
                                        </button>
                                    </div>
                                </div>

                            </form>

                            <div id="stockMessage" class="mt-3">
                                @if ($stock == 0)
                                    <div class="alert alert-danger" role="alert">
                                        Este produto está sem estoque.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-modal-delete :id="$sale->id" :action="route('sales.destroy', $sale->id)" :status="$sale->deleted_at" />
@endsection

@section('footerpage')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#product-carousel').carousel();
            updateTotal();

            $('#quantity').on('change', function() {
                updateTotal();
            });
        });

        function updateTotal() {
            var quantity = parseInt($('#quantity').val()) || 0;
            var originalQuantity = {{ $sale->items->first()->quantity }};
            var price = {{ $sale->items->first()->price }};
            var stock = {{ $stock }};
            var total = quantity * price;

            $('#totalAmount').text('Total: R$ ' + total.toFixed(2).replace('.', ','));
            $('#totalAmountInput').val(total.toFixed(2));

            if (quantity > 0 && (quantity <= stock + originalQuantity)) {
                $('#submitButton').prop('disabled', false);
            } else {
                $('#submitButton').prop('disabled', true);
            }
        }
    </script>
@endsection
