<x-footer>
    <x-nav>
        
        @if(session('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
            {{ session('error') }}
            </div>
        @endif
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-center mb-6">Choisissez Votre Forfait</h1>
            <form action="{{ route('internet.purchase') }}" method="POST">
                @csrf
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-3 px-4 text-left">Forfaits</th>
                            <th class="py-3 px-4 text-left">Prix via *140#</th>
                            <th class="py-3 px-4 text-left">Sélectionner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forfaitPrices as $forfait => $price)
                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : '' }}">
                                <td class="py-3 px-4">{{ $forfait }}</td>
                                <td class="py-3 px-4">{{ $price }} DT</td>
                                <td class="py-3 px-4">
                                    <input type="radio" name="forfait" value="{{ $forfait }}" id="forfait-{{ $forfait }}" class="mr-2">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Choisir le Forfait</button>
                </div>
            </form>
            <div class="text-center mt-4">
                <a href="{{ route('purchase.history') }}" class="text-blue-500 hover:underline">Voir l'Historique des Achats</a>
            </div>
        </div>
    </x-nav>
</x-footer>
