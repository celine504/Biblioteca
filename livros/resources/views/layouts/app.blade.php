<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/edit-book.css') }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css"> <!-- Inclusão do seu arquivo custom.css -->

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Aqui você pode inserir seu próprio logo ou texto -->
                        <a href="{{ route('dashboard') }}" class="text-lg font-bold text-gray-800 dark:text-gray-200">
                            Minha Biblioteca
                        </a>
                    </div>

                    <!-- Links do Navbar -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <!-- Adicione mais links conforme necessário -->
                    </div>

                    <!-- Autenticação do Usuário -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @auth
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-gray-700 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none focus:text-gray-900 dark:focus:text-gray-300 focus:ring">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Links para perfil, configurações, etc. -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                         this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none focus:text-gray-900 dark:focus:text-gray-300 focus:ring">
                                {{ __('Log in') }}
                            </a>
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none focus:text-gray-900 dark:focus:text-gray-300 focus:ring">
                                {{ __('Register') }}
                            </a>
                        @endauth
                    </div>

                    <!-- (menu mobile) -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:text-gray-500 dark:focus:text-gray-400 focus:bg-gray-100 dark:focus:bg-gray-900 rounded-md transition duration-150 ease-in-out">
                           
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Conteúdo da Página -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
