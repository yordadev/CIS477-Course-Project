@extends('layouts.app')


@section('content')
    <div class="row pt-4">
        <div class="col-lg-6 offset-lg-3 pt-4">
            @include('pages.partials.error')
            <form class="form-signin pt-4" action="{{ route('post.register') }}" method="POST">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">Client Account Registeration</h1>
                <label for="name" class="sr-only">Name</label>
                <input type="text" id="name" name="name" class="form-control mb-3" placeholder="Name" required>

                <label for="email" class="sr-only">Email address</label>
                <input type="email" id="email" name="email" class="form-control mb-3" placeholder="Email address" required autofocus>

                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Password"
                    required>

                <label for="confirm_password" class="sr-only">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control mb-3"
                    placeholder="Confirm Password" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Register Account</button>
            </form>
        </div>
    </div>
@endsection
