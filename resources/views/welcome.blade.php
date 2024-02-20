<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Магазин смартфонов</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <!-- навигационная панель -->
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Корзина</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Вход</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif
            <!-- контент -->
            <div class="max-w-7xl mx-auto p-6 lg:p-8 w-3/4 flex flex-wrap justify-around">
                <!-- список телефонов магазина -->
                @foreach ($phones as $phone)
                <div class='inline-block py-6 px-12 mb-6 border-solid border-2 shadow-xl m-1'>
                    <p class='text-5xl p-2 mb-2'>{{$phone->name}}</p>
                    <p class='text-2xl p-2 mb-2'>{{$phone->price}} руб.</p>
                    @if($is_auth)
                    <button class=' border-solid border-2 py-3 px-6 bg-yellow-300 border-inherit rounded-md'>Добавить в корзину</button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
