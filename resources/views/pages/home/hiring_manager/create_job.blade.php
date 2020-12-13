<form method="POST" id="create_resume" action="{{ route('post.hiring.create.job') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="name">Job Title</label>
            <input type="text" value="{{ old('title') }}" class="form-control" name="title"
                placeholder="Full-stack Application Developer">
        </div>
        <div class="form-group col-md-4">
            <label for="location">Location</label>
            <input type="text" value="{{ old('location') }}" class="form-control" name="location"
                placeholder="Remote, United States">
        </div>
        <div class="form-group col-md-4">
            <div class="form-group">
                <label for="minimum_education">Minimum Education Level</label>
                <select class="form-control" name="minimum_education" id="minimum_education">s
                    <option value="na">No Education Needed</option>
                    <option value="hs">High School Diplma</option>
                    <option value="ug">Undergrad Degree</option>
                    <option value="gd">Graduate Degree</option>
                    <option value="dg">Doctoral Degree</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="location">Description</label>
            <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
        </div>



    </div>

    <div class="form-row">

        <div class="form-group col-lg-4">
            <label for="name">Desired Attribute</label>
            <input type="text" class="form-control" name="attributes[]" placeholder="Unique skill">
        </div>
        <div class="form-group col-lg-4">
            <label for="location">Desired Attribute</label>
            <input type="text" class="form-control" name="attributes[]" placeholder="Unique skill">
        </div>
        <div class="form-group col-lg-4">
            <label for="location">Desired Attribute</label>
            <input type="text" class="form-control" name="attributes[]" placeholder="Unique skill">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-lg-4">
            <label for="name">Desired Attribute</label>
            <input type="text" class="form-control" name="attributes[]" placeholder="Unique skill">
        </div>
        <div class="form-group col-lg-4">
            <label for="location">Desired Attribute</label>
            <input type="text" class="form-control" name="attributes[]" placeholder="Unique skill">
        </div>
        <div class="form-group col-lg-4">
            <label for="location">Desired Attribute</label>
            <input type="text" class="form-control" name="attributes[]" placeholder="Unique skill">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-lg-12">
            <button class="btn btn-block btn-primary" type="submit" id="create-job">Create Job Listing</button>
        </div>
    </div>

</form>
