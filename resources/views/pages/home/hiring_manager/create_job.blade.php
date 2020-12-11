<form method="POST" id="create_resume" action="{{ route('post.hiring.job') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Job Title</label>
            <input type="text" class="form-control" name="title" placeholder="Full-stack Application Developer">
        </div>
        <div class="form-group col-md-6">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" placeholder="Remote, United States">
        </div>
        <div class="form-group col-md-12">
            <label for="location">Description</label>
            <textarea type="text" class="form-control" name="description">Something Here...</textarea>
        </div>

        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Minimum Education Level</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="na">No Education Needed</option>
                    <option value="hs">High School Diplma</option>
                    <option value="ug">Undergrad Degree</option>
                    <option value="gd">Graduate Degree</option>
                    <option value="dg">Doctoral Degree</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Full Time / Part Type</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="ft">Full Time</option>
                    <option value="pt">Part Time</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-row">

        <div class="form-group col-lg-4">
            <label for="name">Desired Attribute</label>
            <input type="text" class="form-control" name="attribute[]" placeholder="Full-stack Application Developer">
        </div>
        <div class="form-group col-lg-4">
            <label for="location">Desired Attribute</label>
            <input type="text" class="form-control" name="attribute[]" placeholder="Remote, United States">
        </div>
        <div class="form-group col-lg-4">
            <label for="location">Desired Attribute</label>
            <input type="text" class="form-control" name="attribute" placeholder="Remote, United States">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-lg-4">
            <label for="name">Desired Attribute</label>
            <input type="text" class="form-control" name="attribute[]" placeholder="Full-stack Application Developer">
        </div>
        <div class="form-group col-lg-4">
            <label for="location">Desired Attribute</label>
            <input type="text" class="form-control" name="attribute[]" placeholder="Remote, United States">
        </div>
        <div class="form-group col-lg-4">
            <label for="location">Desired Attribute</label>
            <input type="text" class="form-control" name="attribute" placeholder="Remote, United States">
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-lg-12">
            <button class="btn btn-block btn-primary" type="submit" id="create-job">Create Job Listing</button>
        </div>
    </div>

</form>
