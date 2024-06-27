@extends('layouts.app.main')

@section('titlepage')
    Visualizar Cliente
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('clients.index') }}">Clientes</a></li>
    <li class="breadcrumb-item active">Visualizar Cliente</li>
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
                                        placeholder="Nome do cliente" readonly value="{{ old('name', $client->name) }}" />
                                    <x-input-error :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="email">E-mail</label>
                                    <input id="email" name="email" class="form-control" type="email"
                                        placeholder="E-mail do cliente" readonly
                                        value="{{ old('email', $client->email) }}" />
                                    <x-input-error :messages="$errors->get('email')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="cpf">CPF</label>
                                    <input id="cpf" name="cpf" class="form-control" type="text"
                                        placeholder="CPF do cliente" readonly value="{{ old('cpf', $client->cpf) }}" />
                                    <x-input-error :messages="$errors->get('cpf')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="phone">Telefone</label>
                                    <input id="phone" name="phone" class="form-control" type="text"
                                        placeholder="Telefone do cliente" readonly
                                        value="{{ old('phone', $client->phone) }}" />
                                    <x-input-error :messages="$errors->get('phone')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="zip_code">CEP</label>
                                    <input id="zip_code" name="zip_code" class="form-control" type="text"
                                        placeholder="CEP" readonly value="{{ old('zip_code', $client->zip_code) }}" />
                                    <x-input-error :messages="$errors->get('zip_code')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="uf">UF</label>
                                    <input id="uf" name="uf" class="form-control" type="text"
                                        placeholder="UF" readonly value="{{ old('uf', $client->uf) }}" />
                                    <x-input-error :messages="$errors->get('uf')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="city">Cidade</label>
                                    <input id="city" name="city" class="form-control" type="text"
                                        placeholder="Cidade" readonly value="{{ old('city', $client->city) }}" />
                                    <x-input-error :messages="$errors->get('city')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="neighborhood">Bairro</label>
                                    <input id="neighborhood" name="neighborhood" class="form-control" type="text"
                                        placeholder="Bairro" readonly
                                        value="{{ old('neighborhood', $client->neighborhood) }}" />
                                    <x-input-error :messages="$errors->get('neighborhood')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="number">Número</label>
                                    <input id="number" name="number" class="form-control" type="text"
                                        placeholder="Número" readonly value="{{ old('number', $client->number) }}" />
                                    <x-input-error :messages="$errors->get('number')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="address">Endereço</label>
                                    <input id="address" name="address" class="form-control" type="text"
                                        placeholder="Endereço" readonly value="{{ old('address', $client->address) }}" />
                                    <x-input-error :messages="$errors->get('address')" />
                                </div>
                            </div>

                            <div class="col-md-4 col-12 mb-1">
                                <div>
                                    <label class="form-label" for="complement">Complemento</label>
                                    <input id="complement" name="complement" class="form-control" type="text"
                                        placeholder="Complemento" readonly
                                        value="{{ old('complement', $client->complement) }}" />
                                    <x-input-error :messages="$errors->get('complement')" />
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-end gap-1">
                                <a class="btn btn-warning btn-sm" href="{{ route('clients.index') }}"> <i
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
