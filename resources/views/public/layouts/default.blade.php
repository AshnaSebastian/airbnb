<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Airbnb</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    </head>

    <body>
        <header>
            @include('public.layouts._nav')
        </header>

        @yield('content')

        <script src="{{ elixir('js/all.js') }}"></script>

    </body>

</html>
