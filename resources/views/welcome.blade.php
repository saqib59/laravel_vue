<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="/css/all.css">        
     </head>
    <body>
        <div id="app">
            <app></app>
        </div>
    </body>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>   
</html>
