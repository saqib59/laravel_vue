<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">    
    <script>
        window.Laravel = {
            user : {!! auth()->user() ?? 'false' !!},
            permission : {!! auth()->user()->role->permissions ?? 'false' !!}
        }
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>    
     </head>
    <body>
        <h1>asdasdasd</h1>
        <div id="app">
            
        </div>
    </body>
</html>
