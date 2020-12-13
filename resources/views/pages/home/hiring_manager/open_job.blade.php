<div class="modal fade" id="job_info-{{ $job['information']->job_id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="job_infoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="job_infoLabel">{{ $job['information']->title }} Job Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 text-center">
                        <h5 class="text-muted">Job ID</h5>
                        <h5>{{ $job['information']->job_id }}</h5>
                    </div>
                    <div class="col-6 text-center">
                        <h5 class="text-muted">Location</h5>
                        <h5>{{ $job['information']->location }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pt-4">
                        <h5 class="text-muted text-center">Job Description</h5>
                        <p>{{ $job['information']->description }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pt-4 text-center">

                        <h5 class="text-muted">Desired Attributes</h5>
                        <div class="col-6 offset-3">
                            <ul class="list-group list-group-flush">
                                @foreach ($job['information']->attributes as $attribute)
                                    <li class="list-group-item">{{ $attribute->name }}</li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-danger"
                        form="close-{{ $job['information']->job_id }}" type="submit">Close Job</button>
            </div>

        
        </div>
    </div>
</div>
