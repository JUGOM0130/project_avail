<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">
        @include('task.header')
        @yield('contents')
    @vite(['resources/sass/app.scss'])
</body>

</html>
