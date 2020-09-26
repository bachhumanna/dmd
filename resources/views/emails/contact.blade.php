<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>

    <body style="background: #efefef;">

        {!!$content!!}

    </body>
</html>
