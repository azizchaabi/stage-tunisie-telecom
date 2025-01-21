<x-footer>
    <x-nav>
        @if(session('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
            </div>
        @endif
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-center mb-6">Créer une Facture pour l'Utilisateur ID: {{ $user_id }}</h1>
            <form action="{{ route('invoice.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <input type="text" name="description" id="description" class="border rounded w-full py-2 px-3" required>
                </div>

                <div class="mb-4">
                    <label for="amount" class="block text-gray-700">Montant</label>
                    <input type="number" name="amount" id="amount" class="border rounded w-full py-2 px-3" required>
                </div>

                <div class="mb-4">
                    <label for="due_date" class="block text-gray-700">Date d'échéance</label>
                    <input type="date" name="due_date" id="due_date" class="border rounded w-full py-2 px-3" required>
                </div>

                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Créer Facture</button>
            </form>
        </div>
    </x-nav>
</x-footer>
