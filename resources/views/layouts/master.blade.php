<!doctype html>
<html lang="{{ app()->getLocale() }}">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        @yield('navbar')
        <div class="row">
            @section('sidebar')
                This is the master sidebar.
            @show
            @yield('content')
        </div>
        <div class="row">
            @section('footer')
                This is the master footer
            @show
        </div>
    </div>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
