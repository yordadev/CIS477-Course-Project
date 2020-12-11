<form method="POST" id="create_resume" action="{{ route('post.candidate.resume') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Resume Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Resume Name">
        </div>
        <div class="form-group col-md-6">
            <label for="location">location</label>
            <input type="text" class="form-control" name="location" id="location" placeholder="Remote, United States">
        </div>
    </div>
    <div class="form-row text-left">
        <div class="form-group col-md-3">
            <label for="highschool">Do you have a High School Diploma?</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="highschool1" name="highschool" value="true" class="custom-control-input"
                    onclick="show_highschool()">
                <label class="custom-control-label" for="highschool1">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="highschool2" name="highschool" value="false" class="custom-control-input"
                    onclick="hide_highschool()">
                <label class="custom-control-label" for="highschool2">No</label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="undergrad">Do you have a Undergrad level degree?</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="undergrad1" name="undergrad" value="true" class="custom-control-input"
                    onclick="show_undergrad()">
                <label class="custom-control-label" for="undergrad1">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="undergrad2" name="undergrad" value="false" class="custom-control-input"
                    onclick="hide_undergrad()">
                <label class="custom-control-label" for="undergrad2">No</label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="graduate">Do you have a Graduate Level degree?</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="graduate1" name="graduate" value="true" class="custom-control-input"
                    onclick="show_graduate()">
                <label class="custom-control-label" for="graduate1">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="graduate2" name="graduate" value="false" class="custom-control-input"
                    onclick="hide_graduate()">
                <label class="custom-control-label" for="graduate2">No</label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="phd">Do you have a Doctoral Degree?</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="phd1" name="phd" value="true" class="custom-control-input"
                    onclick="show_doctoral()">
                <label class="custom-control-label" for="phd1">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="phd2" name="phd" value="false" class="custom-control-input"
                    onclick="hide_doctoral()">
                <label class="custom-control-label" for="phd2">No</label>
            </div>
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-12" id="highschool_input" style="display: none">
            <label for="hs_name">High School Name</label>
            <input type="text" class="form-control" id="hs_name" name="hs_name">
        </div>
        <div class="form-group col-md-12" id="undergrad_input" style="display: none">
            <label for="ug_name">Undergrad School Name</label>
            <input type="text" class="form-control" id="ug_name" name="ug_name">
        </div>
        <div class="form-group col-md-12" id="graduate_input" style="display: none">
            <label for="g_name">Graduate School Name</label>
            <input type="text" class="form-control" id="g_name" name="g_name">
        </div>
        <div class="form-group col-md-12" id="doctoral_input" style="display: none">
            <label for="phd_name">Doctorate School Name</label>
            <input type="text" class="form-control" id="phd_name" name="phd_name">
        </div>


    </div>


    <div class="row">
        <div class="col-12 text-center">
            <button type="submit" form="create_resume" class="btn btn-block btn-primary">Create
                Resume</button>
        </div>

    </div>
</form>

<script>
    function show_highschool() {
        document.getElementById('highschool_input').style.display = 'block';
    }

    function show_undergrad() {
        document.getElementById('undergrad_input').style.display = 'block';
    }

    function show_graduate() {
        document.getElementById('graduate_input').style.display = 'block';
    }

    function show_doctoral() {
        document.getElementById('doctoral_input').style.display = 'block';
    }

    function hide_highschool() {
        document.getElementById('highschool_input').style.display = 'none';
    }

    function hide_undergrad() {
        document.getElementById('undergrad_input').style.display = 'none';
    }

    function hide_graduate() {
        document.getElementById('graduate_input').style.display = 'none';
    }

    function hide_doctoral() {
        document.getElementById('doctoral_input').style.display = 'none';
    }

</script>
