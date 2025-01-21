<x-footer>
    <x-nav>
        <body class="bg-gray-200 bg-cover h-screen" style="background-image:url(/img/ban1.jpg)">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm mx-auto mt-20">
                <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Ajouter un admin') }}</h2>
                <form method="POST" action="{{ route('admin.add') }}">
                    @csrf

                    
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Nom d\'utilisateur') }}</label>
                        <x-text-input id="name" name="name" type="text" required autofocus 
                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            :value="old('name')" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Adresse e-mail') }}</label>
                        <x-text-input id="email" name="email" type="email" required 
                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            :value="old('email')" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    

                    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Mot de passe') }}</label>
                        <x-text-input id="password" name="password" type="password" required 
                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Confirmer le mot de passe') }}</label>
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" required 
                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    
                    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ __('S\'inscrire') }}
                    </button>

                    
                </form>
            </div>
        </body>
    </x-nav>
</x-footer>
