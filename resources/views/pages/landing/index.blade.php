@extends('layouts.app')


@section('content')
    @if(!Auth::check())
        // display 
        
    @else 

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h1 class="display-4">Taylor's Professional Services</h1>
                <p class="lead">TPS wants to provide a web site so that their clients can complete a staffing request over the internet</p>
                <hr class="my-4">
                <p> In addition, TPS wants to provide their clients with a list of potential candidates based on experience,
                    education, salary, and location. A client will be able to select up to three potential staff members
                    along with the location of work, type of work, and salary and submit the request to the contract
                    manager. Once a client issues a staffing request, the system shall provide an automated response stating
                    that the contract manager will validate their request within 24 hours of receipt.
                    <br>
                    <br>
                    Once a staffing request has been issued, the client will be able to log into the site and search for a
                    staff request by number. The staff request query will result in a page that contains all staff request
                    information along with a field that states whether the staff request is valid, invalid, unable to fill,
                    or filled.
                    <br>
                    <br>
                    TPS staff members should be able update their resumes and picture through the web site.
                </p>
            </div>
        </div>
    </div>
    @endif
@endsection
