@extends('master', [
'title' => 'Add photo to place'
])

@section('content')
    <h1 class="title">{{$place->name}}</h1>
    <div>

        <form class="w-100 d-block" method="post" enctype="multipart/form-data" action="/places/addPhoto">
            @csrf
            <div class="form-group w-100 d-block">
                <label for="exampleFormControlFile1">Photos</label>
                <input name="photos" accept="image/png image/jpg" type="file" multiple class="form-control-file" id="exampleFormControlFile1">
            </div>

            <input type="hidden" name="place_id" value="{{$place->id}}">
            <button type="submit" class="btn btn-primary mx-auto d-block w-25 mt-5">Add</button>
        </form>


    </div>
@endsection