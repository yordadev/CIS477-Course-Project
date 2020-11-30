@extends('layouts.app')


@section('content')
    <div class="row pt-4">
        <div class="col-lg-6 offset-lg-3 pt-4">
            @include('pages.partials.error')
            <form class="form-signin pt-4" action="{{ route('post.login') }}" method="POST">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">Account Login</h1>
                <label for="email" class="sr-only">Email address</label>
                <input type="email" id="email" class="form-control mb-3" name="email" placeholder="Email address" required
                    autofocus>
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Password"
                    required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>

        </div>
    </div>
@endsection
