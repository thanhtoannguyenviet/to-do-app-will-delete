<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        @yield('style')
        .alert-success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>@yield('title')</h1>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    @yield('content')
</body>
</html>