<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TEST gangaBox</title>
        <link rel="icon" href="https://image.winudf.com/v2/image1/Z2FuZ2Fib3hzaG9wLmFuZHJvaWQuYXBwX2ljb25fMTU2ODEyMjIyMV8wNTA/icon.png?w=170&fakeurl=1">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        @livewireStyles
    </head>
    <body>
        @yield('content')

        @livewireScripts
        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
