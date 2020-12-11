<hr>
<div class="row mt-3">
    <div class="col-12">
        @if (Auth::user()->resume->attributes->count() < 1)
        @else
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Current Attribute</th>
                        <th scope="col">Updated Attribute</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach (Auth::user()->resume->attributes as $attribute)
                        <form method="POST" action="{{ route('post.candidate.resume.attribute.update') }}"
                            id="{{ $attribute->attribute_id }}-update">
                            @csrf
                            <tr>
                                <td>{{ $attribute->name }}</td>
                                <td><input type="text" class="form-control" id="value" name="value"
                                        value="{{ $attribute->name }}">
                                    <input type="hidden" value="{{ $attribute->attribute_id }}" name="attribute_id">
                                </td>
                                <td><button class="btn btn-primary" type="submit"
                                        form="{{ $attribute->attribute_id }}-update">Update</button>
                                    <button class="btn btn-danger" type="submit"
                                        form="{{ $attribute->attribute_id }}-remove">Remove</button>
                                </td>
                            </tr>
                        </form>

                        <form method="POST" action="{{ route('post.candidate.resume.attribute.remove') }}"
                            id="{{ $attribute->attribute_id }}-remove">
                            @csrf
                            <input type="hidden" value="{{ $attribute->attribute_id }}" name="attribute_id">
                        </form>
                    @endforeach

                </tbody>
            </table>
        @endif

        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Attribute</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <form method="POST" action="{{ route('post.candidate.resume.attribute.create') }}"
                    id="create-attribute">
                    @csrf
                    <tr>

                        <td><input type="text" class="form-control" name="attribute"></td>
                        <td><button class="btn btn-primary" type="submit" form="create-attribute">Create
                                Attribute</button>

                        </td>
                    </tr>
                </form>




            </tbody>
        </table>



    </div>
</div>
