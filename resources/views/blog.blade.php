<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script>
        window.GQL_URI = '{{ config('app.url') }}/graphql';
    </script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-white dark:bg-gray-700">
    <div id="app">
        <router-view></router-view>
    </div>
</body>

</html>