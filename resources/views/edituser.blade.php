<x-footer>
    <x-nav>
        @if(session('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
            </div>
        @endif
        <div class="container mx-auto px-6 py-8">
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Modifier l'Utilisateur</h1>

            <form action="{{ route('user.update', $user->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-8 max-w-lg mx-auto">
                @csrf
                @method('PUT')

                
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nom</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

               
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                
                <div class="mb-6 text-center">
                    <button type="submit" class=" bg-blue-500 text-white px-6 py-2 rounded-md">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </x-nav>
</x-footer>
