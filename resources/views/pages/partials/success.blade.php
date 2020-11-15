@if (Session::has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif
