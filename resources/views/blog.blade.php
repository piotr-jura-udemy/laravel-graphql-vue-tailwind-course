<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/atom-one-light.min.css"
    title="light" disabled>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/atom-one-dark.min.css"
    title="dark">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  <script>
    window.GQL_URI = '{{ config('app.url') }}/graphql';
  </script>

  <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-white dark:bg-gray-800">
  <div id="app">
    <page-header></page-header>
    <router-view class="min-h-screen"></router-view>
    <page-footer></page-footer>
  </div>
</body>

</html>