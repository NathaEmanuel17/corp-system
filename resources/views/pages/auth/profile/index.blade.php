@extends('layouts.app.main')
@section('titlepage')
  Profile
@endsection
@section('headerpage')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile </li>
@endsection

@section('contentpage')

<!-- profile -->
<div class="card">
    <div class="card-header border-bottom">
        <h4 class="card-title">Profile Details</h4>
    </div>
    <div class="card-body py-2 my-25">
            <!-- form -->
            <form name="update-profile" id="update-profile" action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                <div class="d-flex mb-2">
                    <a href="#" class="me-25">
                        <img src="{{ Auth::user()->picture ? url('storage/' . Auth::user()->picture->path) : url('assets/images/profile/user-uploads/default-avatar.jpg') }}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-end mt-75 ms-1">
                        <div>
                            <label for="photo" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                            <input type="file" id="photo" name="photo" hidden accept="image/*" />
                            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                        </div>
                    </div>
                    <!--/ upload and reset button -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="John" value="{{ Auth::user()->name }}" data-msg="Please enter first name" />
                        <x-input-error :messages="$errors->get('name')"/>
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" />
                        <x-input-error :messages="$errors->get('email')"/>
                    </div>
                    <div class="col-12 d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                    </div>
                </div>
            </form>
        <!--/ form -->
    </div>
</div>

<!-- security -->

<div class="card">
    <div class="card-header border-bottom">
        <h4 class="card-title">Change Password</h4>
    </div>
    <div class="card-body pt-1">
        <!-- form -->
        <form action="{{ route('update-password') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="current-password">Current password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Enter current password" data-msg="Please current password" />
                        <div class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('current-password')"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="password">New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" />
                        <div class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')"/>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="password_confirmation">Confirm New Password</label>
                    <div class="input-group form-password-toggle input-group-merge">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password" />
                        <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')"/>
                </div>
                <div class="col-12">
                    <p class="fw-bolder">Password requirements:</p>
                    <ul class="ps-1 ms-25">
                        <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                    </ul>
                </div>
                <div class="col-12 d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                </div>
            </div>
        </form>
        <!--/ form -->
    </div>
</div>

<!-- /security -->

<!-- deactivate account  -->
<div class="card">
    <div class="card-header border-bottom">
        <h4 class="card-title">Delete Account</h4>
    </div>
    <div class="card-body py-2 my-25">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="checkdestroy" id="checkdestroy" data-msg="Please confirm you want to delete account" />
            <label class="form-check-label font-small-3" for="checkdestroy">
                I confirm my account delete
            </label>
        </div>
        <div class="d-flex flex-row-reverse">
            <button type="button" class="btn btn-danger mt-1 deactivate-account disabled" data-bs-toggle="modal" data-bs-target="#danger">Delete Account</button>
        </div>
    </div>
</div>
<!--/ profile -->

<x-modal-delete :id="Auth::user()->id" :action="route('profile.destroy',Auth::user()->id)"/>

@endsection


@section('footerpage')
    <!-- BEGIN: Page JS-->
    <script src="{{ url('assets/js/pages/profile/scripts.js') }}"></script>
@endsection