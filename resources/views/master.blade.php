<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
    <!-- Styles -->
</head>
<body>
<header class="row p-2 m-0">
    <nav class="nav nav-pills nav-fill d-flex w-100">
        <div class="d-flex mr-auto col-4">
        <a class="nav-item nav-link {{Route::currentRouteName() === 'all-places' ? 'active' : ''}}" href="{{ route('all-places') }}">Places</a>
        <a class="nav-item nav-link {{Route::currentRouteName() === 'create-place-form' ? 'active' : ''}}" href="{{ route('create-place-form')  }} ">Add new place</a>
        <a class="nav-item nav-link mr-auto {{Route::currentRouteName() === 'places.add-photo' ? 'active' : ''}}" href="{{ route('places.add-photo')  }} ">Add new photo</a>
        </div>

        <div class="dropdown col-1  mr-4">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container mt-5">
        @yield('content')
    </div>
</main>
</body>
<script src="/js/app.js"></script>
</html>
