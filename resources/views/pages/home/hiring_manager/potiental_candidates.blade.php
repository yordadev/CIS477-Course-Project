<div class="modal fade" id="candidates-{{ $job['information']->job_id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="candidatesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="candidatesLabel">Potiental Candidates Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($job['candidates'] as $candidate)
                    <div class="row text-center">
                        <div class="col-md-6 col-sm-12">
                            <p>Name:<br>{{ $candidate['name'] }}</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p>Contact:<br>{{ $candidate['contact'] }}</p>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
