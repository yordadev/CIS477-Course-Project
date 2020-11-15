@extends('layouts.app')


@section('content')
    <div class="jumbotron mt-4">
        <h1 class="display-4">Hello {{ Auth::user()->name }}</h1>
        <p class="lead">This is only temporary and will be molded into the best course project, literally ever...</p>
        <hr class="my-4">
        <p>View the repository here.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="https://github.com/yordadev/CIS477-Course-Project" role="button">Github Link</a>
        </p>
    </div>
@endsection
