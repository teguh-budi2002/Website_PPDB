<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PPDB Go School | @yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        *,html,body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Roboto Condensed', sans-serif;
        }
    </style>
</head>

<body>
    <header>
        <div class="flex justify-center">
            <div class="w-11/12 py-4 flex items-center space-x-6">
                <img src="{{ asset('img/logo.png') }}" class="w-20 h-auto" alt="Logo Website">
                <p class="md:text-3xl text-lg font-bold italic uppercase"><span class="text-rose-500">g</span>una <span class="text-rose-500">u</span>tama <span class="text-rose-500">h</span>arapan international school</p>
            </div>
        </div>
    </header>
    @include('partials.navigation')
    <main>
        @yield('content')
    </main>
    <footer class="w-full p-2 bg-blue-primary">
        <p class="text-center text-slate-600 capitalize">&copy; <span class="text-white">Guh International School</span> 2023. All right reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('js')
</body>

</html>
