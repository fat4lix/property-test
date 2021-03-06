<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <title>Laravel</title>


        <style>
            html {
                font-family: 'Roboto', sans-serif;
            }
        </style>
        
    </head>
    <body>
        <div id=app></div>
    </body>
    <script src="{{ mix('/js/app.js') }}"></script>
</html>
