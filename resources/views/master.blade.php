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
    <nav class="nav nav-pills nav-fill col-4">
        <a class="nav-item nav-link {{Route::currentRouteName() === 'all-places' ? 'active' : ''}}" href="{{ route('all-places') }}">Places</a>
        <a class="nav-item nav-link {{Route::currentRouteName() === 'create-place-form' ? 'active' : ''}}" href="{{ route('create-place-form')  }} ">Add new place</a>
        <a class="nav-item nav-link {{Route::currentRouteName() === 'places.add-photo' ? 'active' : ''}}" href="{{ route('places.add-photo')  }} ">Add new photo</a>
    </nav>
</header>
<main>
    <div class="container mt-5">
        @yield('content')
    </div>
</main>

</body>
</html>
