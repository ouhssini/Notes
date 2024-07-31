<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> Notes | @yield('title') </title>
</head>

<body class="vh-100 d-flex">
    <div class="container-fluid  vh-100  d-flex flex-column justify-content-between">
        <div class="row">
            <div class="col">
                <x-nav></x-nav>
            </div>
        </div>
        <div class="main row flex-grow-1">
            <div class="col">
               <div class="container py-3"> @yield('main')</div>
            </div>
        </div>
        <div class="row">
            <div class="col p-0">
                <x-footer></x-footer>
            </div>
        </div>
    </div>
</html>
</body>

</html>