@extends('layouts.app.main')

@section('titlepage')
    Visualizar Produto
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
    <li class="breadcrumb-item active">Visualizar Produto</li>
@endsection

@section('contentpage')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="name">Nome</label>
                                    <input id="name" name="name" class="form-control" type="text"
                                        placeholder="Nome do produto" readonly value="{{ old('name', $product->name) }}" />
                                    <x-input-error :messages="$errors->get('name')" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="price">Preço</label>
                                    <input id="price" name="price" class="form-control" type="text"
                                        placeholder="Preço do produto" readonly value="{{ old('price', $product->price) }}" />
                                    <x-input-error :messages="$errors->get('price')" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="stock">Quantidade em Estoque</label>
                                    <input id="stock" name="stock" class="form-control" type="number"
                                        placeholder="exemplo:10" readonly value="{{ old('stock', $product->stock) }}" />
                                    <x-input-error :messages="$errors->get('stock')" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-12 mb-1">
                            <div>
                                <label class="form-label" for="description">Descrição</label>
                                <textarea id="description" name="description" class="form-control" rows="3" readonly placeholder="Descrição do produto">{{ old('description', $product->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" />
                            </div>
                        </div>

                        <!-- Seção para visualizar imagens selecionadas -->
                        <div class="col-md-12 col-12 mb-1">
                            <label class="form-label">Imagens Selecionadas</label>
                            <div id="selected-images" class="d-flex flex-wrap">
                                <div class="position-relative me-1 mb-1">
                                    @foreach ($product->photos->take(3) as $photo)
                                        <img class="img-thumbnail" style="width: 150px; height: 150px;"
                                            src="{{ url('storage/' . $photo->photo_path) }}" alt="Imagem do Produto">
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-end gap-1">
                                <a class="btn btn-warning btn-sm" href="{{ route('products.index') }}"> <i
                                        class="fas fa-arrow-left"></i> Voltar</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footerpage')
@endsection
