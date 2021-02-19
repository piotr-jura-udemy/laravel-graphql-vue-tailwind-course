<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        <div
            class="flex my-4 py-4 mx-20 border-b border-gray-200 dark:border-gray-600 items-center text-gray-900 dark:text-gray-100">
            <div class="mr-auto text-2xl font-bold">
                <router-link :to="{name: 'index'}">F</router-link>
            </div>
            <dark-mode></dark-mode>
        </div>
        <router-view></router-view>
    </div>
</body>

</html>