<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-300">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 bg-white">
        @include('partials.menu')
        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>