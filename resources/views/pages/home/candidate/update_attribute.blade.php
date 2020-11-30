<hr>
<div class="row mt-3">
    <div class="col-12">
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Current Attribute</th>
                    <th scope="col">Updated Attribute</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
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
                                <button class="btn btn-danger">Remove</button>
                            </td>
                        </tr>
                    </form>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
