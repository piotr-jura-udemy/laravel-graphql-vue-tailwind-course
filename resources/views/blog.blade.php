<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css" title="light" disabled>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/atom-one-dark.min.css" title="dark">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script>
        window.GQL_URI = '{{ config('app.url') }}/graphql';
    </script>

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-white dark:bg-gray-800">
<div id="app">
    <div class="flex p-4 items-center text-gray-900 dark:text-gray-100 sticky top-0 bg-white dark:bg-gray-800">
        <div class="mr-auto flex items-center space-x-4">
            <router-link :to="{name: 'index'}" class="text-xl font-bold mr-10">fado</router-link>
            <router-link :to="{name: 'index'}" class="text-gray-800 dark:text-gray-300 font-bold text-sm">Posts
            </router-link>
            <router-link :to="{name: 'courses'}" class="text-gray-800 dark:text-gray-300 font-bold text-sm">Courses
            </router-link>
            <router-link :to="{name: 'courses'}" class="text-gray-800 dark:text-gray-300 font-bold text-sm">Questions
            </router-link>
        </div>
        <dark-mode></dark-mode>
    </div>
    <router-view class="min-h-screen"></router-view>
    <page-footer></page-footer>
</div>
</body>

</html>
