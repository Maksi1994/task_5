@extends('master', [
'title' => 'Places'
])

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center flex-column">
            @foreach($places as $place)
                <div class="card d-block w-100 mb-5">
                    <div class="card-body">
                        <h5 class="card-title">{{$place->name}}</h5>
                        <h6 class="card-subtitle mb-2 mt-5 text-muted">Count of pictures: {{ $place->images_count }}</h6>
                        <a href="{{ route('get-place', $place->id) }}" class="card-link text-right w-100 d-block">See album</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection