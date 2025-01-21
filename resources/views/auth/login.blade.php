<x-footer>
    <x-nav>
        <body class="bg-gray-200 h-screen" style="background-image: url('/img/ban1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm mx-auto mt-20">
                <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Se connecter') }}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" required autofocus
                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            :value="old('email')" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    
                    <!-- Password Field -->
                    <div class="mb-6">
                        <x-input-label for="password" :value="__('Mot de passe')" />
                        <x-text-input id="password" name="password" type="password" required
                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ __('Log in') }}
                    </button>

                    <div class="mt-4 text-center">
                        <div class="mt-2">
                            <a href="{{ route('register') }}" class="font-bold text-blue-400 visited:text-blue-500">{{ __('Créer un compte') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </body>
    </x-nav>
</x-footer>
