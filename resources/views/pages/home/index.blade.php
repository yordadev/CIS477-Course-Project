@extends('layouts.app')


@section('content')
    <div class="row mt-4">
        <div class="col-12">
            @include('pages.partials.error')
            @include('pages.partials.success')
        </div>
    </div>

    @switch(Auth::user()->permission->accountType())
        @case("candidate")

        <div class="row">
            <div class="col-12">
                <div class="jumbotron mt-4">
                    <h1 class="display-4">Hello {{ Auth::user()->name }}</h1>
                    <p class="lead">Keep your resume updated at all times. If your resume impresses any hiring managers through
                        our
                        resume search feature, we will notify you and connect you with the hiring manager for an interview!</p>
                    <hr class="my-4">
                    <div class="row text-center">
                        <div class="col-lg-4 col-sm-12">
                            <p>Resume Status: </p>

                            @if (is_null(Auth::user()->resume))
                                <span class="badge badge-pill badge-danger">No Resume Found</span>
                            @else
                                <span class="badge badge-pill badge-success">Resume Found</span>
                            @endif
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <p>Resume Created: </p>

                            @if (is_null(Auth::user()->resume))
                                <span class="badge badge-pill badge-danger">No Resume Found</span>
                            @else
                                <span class="badge badge-pill badge-success">{{ Auth::user()->resume->created_at }}</span>
                            @endif
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <p>Last Update: </p>

                            @if (is_null(Auth::user()->resume))
                                <span class="badge badge-pill badge-danger">No Resume Found</span>
                            @else
                                <span class="badge badge-pill badge-success">{{ Auth::user()->resume->updated_at }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Resume Resource Center
                    </div>
                    <div class="card-body">
                        @if (is_null(Auth::user()->resume))
                            <!-- RESUME CREATE FORM -->
                            @include('pages.home.candidate.create_resume')
                            <!-- END RESUME CREATE FORM -->

                        @else
                            <!-- RESUME UPDATE FORM -->
                            @include('pages.home.candidate.update_resume')

                            @include('pages.home.candidate.update_attribute')
                            <!-- END RESUME UPDATE FORM -->

                        @endif
                    </div>
                </div>
            </div>
        </div>

        @break;
        @case("hiring manager")
        @include('pages.home.hiring_manager.jumbotron')
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Manage Job Listings
                    </div>
                    <div class="card-body">
                        @include('pages.home.hiring_manager.job_listings')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Job Intake Center
                    </div>
                    <div class="card-body">
                        @include('pages.home.hiring_manager.create_job')
                    </div>
                </div>
            </div>
        </div>


        @case("staff")

        @case("admin")

        @default

    @endswitch

@endsection
