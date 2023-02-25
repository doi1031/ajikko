<html>
<head>
    <title>@yield('title') | Ajikko(あじっこ)</title>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
</head>
<body>
@include('components.header')
<div class="bg-white">
    <main class="mx-auto px-4 pt-14 pb-24 sm:px-6 sm:pt-16 sm:pb-32 lg:max-w-5xl lg:px-8">
        @yield('content')
    </main>
    @include('components.footer')
</div>
</body>
</html>
