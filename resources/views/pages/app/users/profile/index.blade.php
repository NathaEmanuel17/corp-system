@extends('layouts.app.main')

@section('titlepage')
    Profile
@endsection

@section('headerpage')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Perfil</li>
@endsection

@section('contentpage')
    <div class="row match-height pe-0">
        <div class="col-xl-12 col-md-12 col-12 pe-0">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title"><strong>Detalhes do perfil:</strong> {{ $user->name }}</h4>
                </div>
                <div class="card-body py-2 my-25">
                    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- header section -->
                        <div class="d-flex mb-2">
                            <a href="#" class="me-25">
                                <img src="{{ $user->photo ? url('storage/' . $user->photo) : url('assets/images/logo/no-logo.png') }}"
                                    id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image"
                                    height="100" width="100" />
                            </a>
                            <!-- upload and reset button -->
                            <div class="d-flex align-items-end mt-75 ms-1">
                                <div>
                                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Atualizar
                                        foto</label>
                                    <input type="file" name="photo" id="account-upload" hidden accept="image/*" />
                                    <button type="button" id="account-reset"
                                        class="btn btn-sm btn-outline-secondary mb-75">Limpar</button>
                                    <p class="mb-0">tipos de imagem: png, jpg, jpeg.</p>
                                    <x-input-error :messages="$errors->get('photo')" />
                                </div>
                            </div>
                            <!--/ upload and reset button -->
                        </div>
                        <!--/ header section -->

                        <div class="row">
                            <div class="col-md-4 mt-1 col-12">
                                <div>{{$errors}}
                                    <label class="form-label" for="name">Nome</label>
                                    <input id="name" name="name" class="form-control" type="text"
                                        placeholder="Nome do usuário"
                                        value="{{ isset($user) ? $user->name : old('name') }}" />
                                    <x-input-error :messages="$errors->get('name')" />
                                </div>
                            </div>
                            <div class="col-md-4 mt-1 col-12">
                                <div>
                                    <label class="form-label" for="email">E-mail</label>
                                    <input id="email" name="email" class="form-control" type="email"
                                        placeholder="E-mail do usuário"
                                        value="{{ isset($user) ? $user->email : old('email') }}" />
                                    <x-input-error :messages="$errors->get('email')" />
                                </div>
                            </div>

                            <div class="col-md-4 mt-1 col-12">
                                <div>
                                    <label class="form-label" for="cpf">CPF</label>
                                    <input id="cpf" name="cpf" class="form-control" type="text"
                                        placeholder="CPF do usuário" value="{{ isset($user) ? $user->cpf : old('cpf') }}" />
                                    <x-input-error :messages="$errors->get('cpf')" />
                                </div>
                            </div>
                            <div class="col-md-4 mt-1 col-12">
                                <div>
                                    <label class="form-label" for="cellphone">Celular</label>
                                    <input id="cellphone" name="cellphone" class="form-control" type="text"
                                        placeholder="Celular do usuário"
                                        value="{{ isset($user) ? $user->cellphone : old('cellphone') }}" />
                                    <x-input-error :messages="$errors->get('cellphone')" />
                                </div>
                            </div>
                            <div class="col-md-4 mt-1 col-12 mb-2">
                                <div>
                                    <label class="form-label" for="role">Perfil</label>
                                    <select class="select2 form-select" id="role" name="role" @if ($user->role != 'admin') disabled @endif>
                                        <option value="" disabled selected>Selecione...</option>
                                        <option value="admin" @if ($user->role == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="manage" @if ($user->role == 'manage') selected @endif>Gerente
                                        </option>
                                        <option value="user" @if ($user->role == 'user') selected @endif>Usuário
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('role')" />
                                </div>
                            </div>

                            <div class="divider divider-danger">
                                <div class="divider-text">Atualizar senha<code>{opcional}</code></div>
                            </div>

                            <div class="col-md-4 mt-1 col-12">
                                <label class="form-label" for="password">Senha</label>
                                <div class="input-group form-password-toggle input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="*********" />
                                    <div class="input-group-text cursor-pointer">
                                        <i data-feather="eye"></i>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password')" />
                            </div>
                            <div class="col-md-4 mt-1 col-12 mb-1">
                                <label class="form-label" for="password_confirmation">Confirmar senha</label>
                                <div class="input-group form-password-toggle input-group-merge">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="*********" />
                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-end gap-1">
                                <a class="btn btn-info btn-sm" href="{{ route('dashboard') }}"> <i
                                        class="fas fa-arrow-left"></i> Dashboard</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('users.index') }}"> <i
                                        class="fas fa-arrow-left"></i> Voltar</a>
                                <button class="btn btn-primary btn-sm" type="submit"> <i class="fas fa-check"></i>
                                    Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footerpage')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cellphone').mask('(00) 00000-0000');
            $('#cpf').mask('000.000.000-00');
        });

        $('#account-upload').on('change', function() {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#account-upload-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#account-reset').on('click', function() {
            $('#account-upload-img').attr('src', '{{ url('assets/images/logo/no-logo.png') }}');
            $('#account-upload').val('');
        });

        $('#account-upload').on('change', function() {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#account-upload-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
