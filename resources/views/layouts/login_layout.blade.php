<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="icon" href="{{ URL('/assets/images/favicon.png') }}">
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <title>Online Education Platform</title>
</head>

<body>
    @include('components.validation')
    <div class="main relative">
        @yield('main-body')
    </div>
    @include('components.notify')
</body>

</html>
