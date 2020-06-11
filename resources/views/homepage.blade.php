<!doctype html>
<html lang="lv">
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device—width, initial—scale=1, shrink-to-fit=no"
        >
        <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baD1411NQApFmC26EwAOH8WgZ15MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"
        >

        <title>PD2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <h1>PD2</h1>
    <footer>
        @if(Auth::check())
        <a href="/books">Administration</a>
        @else
        <a href="/login">Login</a>
        @endif
    </footer>
    </body>
</html>
