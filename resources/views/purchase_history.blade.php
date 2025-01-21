<x-footer>
    <x-nav>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-center mb-6">Historique des Achats</h1>
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-3 px-4 text-left">Forfait</th>
                        <th class="py-3 px-4 text-left">Montant</th>
                        <th class="py-3 px-4 text-left">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                        <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : '' }}">
                            <td class="py-3 px-4">{{ $purchase->forfait }}</td>
                            <td class="py-3 px-4">{{ $purchase->amount }} DT</td>
                            <td class="py-3 px-4">{{ $purchase->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-nav>
</x-footer>
