<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name', 'Ori Dashboard')}}</title>
    </head>
    <body>
            <h1><?php echo $title; ?></h1>
            <p>This is the about page</p>
    </body>
</html>
