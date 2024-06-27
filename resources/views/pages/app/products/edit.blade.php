@extends('layouts.app.main')

@section('titlepage')
    Cadastrar Produto
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
    <li class="breadcrumb-item active">Cadastrar Produto</li>
@endsection

@section('contentpage')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4 col-12 mb-1">
                                    <div>
                                        <label class="form-label" for="name">Nome</label>
                                        <input id="name" name="name" class="form-control" type="text"
                                            placeholder="Nome do produto" value="{{ old('name', $product->name) }}" />
                                        <x-input-error :messages="$errors->get('name')" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12 mb-1">
                                    <div>
                                        <label class="form-label" for="price">Preço</label>
                                        <input id="price" name="price" class="form-control" type="text"
                                            placeholder="Preço do produto" value="{{ old('price', $product->price) }}" />
                                        <x-input-error :messages="$errors->get('price')" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12 mb-1">
                                    <div>
                                        <label class="form-label" for="stock">Quantidade em Estoque</label>
                                        <input id="stock" name="stock" class="form-control" type="number"
                                            placeholder="exemplo:10" value="{{ old('stock', $product->stock) }}" />
                                        <x-input-error :messages="$errors->get('stock')" />
                                    </div>
                                </div>

                                <div class="col-md-4 col-12 mb-1">
                                    <div>
                                        <label class="form-label" for="photos">Fotos do Produto (máximo 3)</label>
                                        <input id="photos" name="photos[]" class="form-control" type="file" multiple
                                            accept="image/*" />
                                        <x-input-error :messages="$errors->get('photos')" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="description">Descrição</label>
                                    <textarea id="description" name="description" class="form-control" rows="3"
                                        placeholder="Descrição do produto">{{ old('description', $product->description) }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" />
                                </div>
                            </div>

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
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#danger">
                                            Excluir
                                        </button>
                                    <button id="btn-reset" type="button" class="btn btn-info btn-sm"> <i
                                            class="fas fa-times"></i> Limpar formulario</button>
                                    <button class="btn btn-success btn-sm" type="submit"> <i class="fas fa-check"></i>
                                        Atualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-modal-delete :id="$product->id" :action="route('products.destroy', $product->id)" :status="$product->deleted_at" />

@endsection

@section('footerpage')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#price').mask('000.000.000.000.000,00', {reverse: true});

            $('#photos').on('change', function() {
                $('#selected-images').empty();

                let files = this.files;
                Array.from(files).slice(0, 3).forEach(file => {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        let imgElement = $('<div class="position-relative me-1 mb-1">'
                            + '<img class="img-thumbnail" style="width: 150px; height: 150px;" src="' + event.target.result + '" alt="Imagem do Produto"></div>');

                        $('#selected-images').append(imgElement);
                    };
                    reader.readAsDataURL(file);
                });

                updateFileInput(); 

                function updateFileInput() {
                    let remainingFiles = Array.from(files).slice(0, 3);
                    $('#photos').prop('files', remainingFiles);
                    $('#photos-count').text(remainingFiles.length);
                }
            });

            // Botão de reset para limpar o formulário
            $('#btn-reset').on('click', function() {
                $('#selected-images').empty();
                $('#photos').val('');
                $('#photos-count').text('0');
            });
        });
    </script>
@endsection
