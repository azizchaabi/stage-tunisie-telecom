<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>Tunisie Telecom</title>
</head>
<body class="bg-gray-100">
    <nav class="flex justify-between items-center p-4 bg-gray-100 shadow-md">
        
        <a href="/" class="flex items-center">
            <img src="/img/Tunisie-Telecom.png" alt="Logo" class="h-10 w-auto">
            <span class="text-lg font-semibold ml-2">Tunisie Telecom</span>
        </a>
        
        
        <div class="flex items-center relative">
            @if (Route::has('login'))
                @auth('admin')
                    <div class="relative">
                        <button id="user-menu-button" class="text-black hover:text-gray-700 px-4 py-2 focus:outline-none">
                            {{ Auth::guard('admin')->user()->name }}
                        </button>
                        <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden z-50">
                            <a href="{{ url('/admin') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Mon Compte</a>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-black hover:bg-gray-100">Déconnexion</button>
                            </form>
                        </div>
                    </div>
                @elseif (Auth::check())
                    <div class="relative">
                        <button id="user-menu-button" class="text-black hover:text-gray-700 px-4 py-2 focus:outline-none">
                            {{ Auth::user()->name }} 
                            
                            <span class="ml-2 text-sm text-gray-600">
                                (solde: {{ number_format(Auth::user()->solde, 2) }} DT)
                            </span>
                        </button>
                        <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden z-50">
                            <a href="{{ url('/profile') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Mon Compte</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-black hover:bg-gray-100">Déconnexion</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="login-button bg-gradient-to-r from-blue-500 to-cyan-400 text-white hover:bg-blue-600 px-4 py-2 rounded-md transition mr-2">Se connecter</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register-button bg-gradient-to-r from-blue-500 to-cyan-400 text-white hover:bg-blue-600 px-4 py-2 rounded-md transition">S'inscrire</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg">
        {{$slot}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const currentPath = window.location.pathname;
            const loginButton = document.querySelector('.login-button');
            const registerButton = document.querySelector('.register-button');
            const userMenuButton = document.getElementById('user-menu-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            
            if (currentPath === '/login' && loginButton) {
                loginButton.style.display = 'none';
            }
            if (currentPath === '/register' && registerButton) {
                registerButton.style.display = 'none';
            }

            
            if (userMenuButton) {
                userMenuButton.addEventListener('click', function () {
                    dropdownMenu.classList.toggle('hidden');
                });
            }

            
            window.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html> 

                                
