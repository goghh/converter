<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('stylesheet')

    <title>Image converter</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand h1">Image converter</span>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
