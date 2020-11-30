@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="row ">
            <div class="col-lg-12">
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            </div>
        </div>
    @endforeach
@endif

<?php   $bariable ?>