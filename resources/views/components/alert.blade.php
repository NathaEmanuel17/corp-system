<div class="row match-height pe-0 d-flex justify-content-center w-100">
    <div class="col-xl-12 col-md-12 col-12 pe-0">
        @if(session()->has('message'))
        <div id="alertDiv" class="alert alert-{{ Session::get('type') }} alert-dismissible fade show p-1" role="alert">
            {!! Session::get('message') !!}
            <button id="closeButton" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</div>