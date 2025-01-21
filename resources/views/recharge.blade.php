<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
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
                <h1 class="text-2xl font-bold text-center mb-4">Recharger Votre Solde</h1>
                
                <form action="{{ route('recharge') }}" method="POST" class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="text-gray-700">Montant à Recharger (DT)</label>
                        <input type="number" name="amount" id="amount" class="mt-2 border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-3">
                        <label for="card_number" class="text-gray-700 flex items-center">
                            Numéro de Carte
                            <i class="fab fa-cc-visa h-5 text-blue-600 ml-2"></i>
                            <i class="fab fa-cc-mastercard h-5 text-red-600 ml-2"></i>
                            <i class="fab fa-cc-paypal h-5 text-blue-400 ml-2"></i>
                            <i class="fab fa-cc-amex h-5 text-green-600 ml-2"></i>
                        </label>
                        <input type="text" name="card_number" id="card_number" class="mt-2 border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required pattern="\d{16}" maxlength="16" placeholder="1234 5678 9012 3456" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>

                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <label for="expiry_date" class="text-gray-700 flex items-center">
                                Date d'Expiration
                                <i class="fas fa-calendar-alt h-5 text-gray-700 ml-2"></i>
                            </label>
                            <input type="month" name="expiry_date" id="expiry_date" class="mt-2 border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label for="cvv" class="text-gray-700 flex items-center">
                                CVV
                                <i class="fas fa-lock h-5 text-gray-700 ml-2"></i>
                            </label>
                            <input type="text" name="cvv" id="cvv" class="mt-2 border border-gray-300 rounded p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required pattern="\d{3}" maxlength="3" placeholder="123" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-200">Recharger</button>
                    </div>
                </form>
            </div>
        </x-nav>
    </x-footer>
</body>
</html>
