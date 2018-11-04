@extends('master', [
'title' => 'Add photo'
])

@section('content')
    <div>

        <form class="w-100 d-block" method="post" enctype="multipart/form-data" action="/places/addPhoto">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Place</label>
                <select name="place_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($places as $place)
                        <option value="{{$place->id}}">{{$place->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group w-100 d-block">
                <label for="exampleFormControlFile1">Photos</label>
                <input name="photos" accept="image/png image/jpg" type="file" multiple class="form-control-file"
                       id="exampleFormControlFile1">
            </div>

            <button type="submit" class="btn btn-primary mx-auto d-block w-25 mt-5">Add</button>
        </form>

        @foreach($errors->all() as $error)
            <div class="alert alert-danger mx-auto mb-2" role="alert">
                {{$error}}
            </div>
        @endforeach
    </div>
@endsection