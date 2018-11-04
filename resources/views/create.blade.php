@extends('master', [
'title' => 'Add place'
])

@section('content')
    <div class="w-50 mx-auto ">
        <form method="post" class="mb-5 d-block" enctype="multipart/form-data"  action="/places/add">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" value="{{old('name')}}" class="form-control" name="name" id="exampleInputPassword1"
                       placeholder="Name of place">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Type</label>
                <select class="form-control" name="type_id" id="exampleFormControlSelect1">
                    @foreach($types as $type)
                        <option {{old('type' === $type->id ? 'selected' : '')}} value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mx-auto d-block w-50 mt-5">Save</button>
        </form>

        @foreach($errors->all() as $error)
            <div class="alert alert-danger mx-auto mb-2" role="alert">
                {{$error}}
            </div>
        @endforeach
    </div>
@endsection