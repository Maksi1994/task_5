@extends('master', [
'title'=> $place->name
])

@section('content')
    <h1 class="title mb-5">{{$place->name}}</h1>
    <div class="d-flex flex-wrap pt-2 my-5">
        <p class="w-100">All Estimates: <strong>{{$imagesEstimatesCount}}</strong></p>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('add-photo-form', [$place->id]) }}" class="btn btn-primary btn-lg active" role="button"
           aria-pressed="true">Add photos</a>

        <div class="w-25 d-flex justify-content-end">
            <a href="{{ route('add-estimation', ['place', $place->id, 'like']) }}" class="btn btn-primary btn-lg active mr-2" role="button"
               aria-pressed="true">Like ({{$place->estimates()->where('name', 'like')->count()}})</a>
            <a href="{{ route('add-estimation', ['place', $place->id, 'dislike']) }}" class="btn btn-primary btn-lg active" role="button"
               aria-pressed="true">Dislike ({{$place->estimates()->where('name', 'dislike')->count()}})</a>
        </div>
    </div>


    <div class="row mt-5">
        @foreach($place->images as $image)
            <div class="col-3 mb-3">
                <img class="d-block w-100" src="{{url('storage/images/'.$image->name)}}" alt="">
                <div class="d-flex p-1 mt-2 border-left-1">
                    <a href="{{ route('add-estimation', ['image', $image->id, 'like']) }}" class="btn btn-primary  active mr-2" role="button"
                       aria-pressed="true">Like ({{$image->estimates()->where('name', 'like')->count()}})</a>
                    <a href="{{ route('add-estimation', ['image', $image->id, 'dislike']) }}" class="btn btn-primary  active" role="button"
                       aria-pressed="true">Dislike ({{$image->estimates()->where('name', 'dislike')->count()}})</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection