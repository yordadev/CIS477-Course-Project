<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Job #</th>
            <th scope="col">Title</th>
            <th scope="col">Created</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['jobs'] as $job)
            <tr>
                <th scope="row">{{ $job['information']->job_id }}</th>
                <td>{{ ucfirst($job['information']->title) }}</td>
                <td>{{ $job['information']->created_at->diffForHumans() }}</td>
                <td><button class="btn btn-success" data-toggle="modal"
                        data-target="#job_info-{{ $job['information']->job_id }}">Open Job</button>
                    <button class="btn btn-primary" data-toggle="modal"
                        data-target="#candidates-{{ $job['information']->job_id }}">View
                        Candidates</button>
                </td>
            </tr>
            <form method="POST" action="{{ route('post.hiring.close.job') }}"
                id="close-{{ $job['information']->job_id }}">
                @csrf
                <input type="hidden" value="{{ $job['information']->job_id }}" name="job_id">
            </form>

            @include('pages.home.hiring_manager.open_job')
            @include('pages.home.hiring_manager.potiental_candidates')
        @endforeach
    </tbody>
</table>
