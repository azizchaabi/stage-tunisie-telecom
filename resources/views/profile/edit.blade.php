<x-footer>
    <x-nav>

        <x-slot name="header">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-6 rounded-lg shadow-lg">
                <h2 class="font-semibold text-3xl text-white leading-tight text-center">
                    {{ __('Paramètres du profil') }}
                </h2>
            </div>
        </x-slot>

        <div class="py-12 bg-gray-50 min-h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

                
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-medium text-gray-800 border-b pb-2">{{ __('Informations du profil') }}</h3>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-center space-x-4">
                                <i class="fas fa-user text-gray-500"></i>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">{{ __('Nom d\'utilisateur') }}</label>
                                    <p class="mt-1 text-gray-600">{{ $user->name }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <i class="fas fa-envelope text-gray-500"></i>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">{{ __('Adresse e-mail') }}</label>
                                    <p class="mt-1 text-gray-600">{{ $user->email }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <i class="fas fa-phone text-gray-500"></i>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">{{ __('Numéro de téléphone') }}</label>
                                    <p class="mt-1 text-gray-600">{{ $user->numero }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <i class="fas fa-wallet text-gray-500"></i>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">{{ __('Solde') }}</label>
                                    <p class="mt-1 text-gray-600">{{ number_format($user->solde, 2) }} DT</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>

    </x-nav>
</x-footer>
