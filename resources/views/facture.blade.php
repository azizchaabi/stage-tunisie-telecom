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
            <h1 class="text-2xl font-bold text-center mb-6">Choisissez Votre Facture à Payer</h1>
            <form action="{{ route('facture.payment.submit', '') }}" method="POST">
                @csrf
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-3 px-4 text-left">Description</th>
                            <th class="py-3 px-4 text-left">Montant</th>
                            <th class="py-3 px-4 text-left">Date d'Échéance</th>
                            <th class="py-3 px-4 text-left">Sélectionner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : '' }}">
                                <td class="py-3 px-4">{{ $invoice->description }}</td>
                                <td class="py-3 px-4">{{ $invoice->amount }} DT</td>
                                <td class="py-3 px-4">{{ $invoice->due_date->format('d-m-Y') }}</td>
                                <td class="py-3 px-4">
                                    <input type="radio" name="invoice_id" value="{{ $invoice->id }}" id="invoice-{{ $invoice->id }}" class="mr-2">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Payer la Facture</button>
                </div>
            </form>
        </div>
    </x-nav>
</x-footer>
