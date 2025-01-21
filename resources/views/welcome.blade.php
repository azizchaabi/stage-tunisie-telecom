<x-footer>
  <x-nav>
    <x-carousel>
      <div class="container mx-auto px-4">
        <h3 class="text-center font-bold text-blue-800 mt-5 text-3xl">
          Nos services
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-5">
          @if(auth()->guard('admin')->check())
            <!-- Admin Buttons -->
            

            <a href="{{ route('admin.users') }}" class="w-full">
              <button class="bg-white rounded-lg shadow-lg p-5 text-center transition-shadow hover:shadow-2xl hover:scale-105 w-full h-full">
                <div class="flex items-center justify-center mb-2">
                  <i class="fa-solid fa-users text-6xl text-blue-800"></i>
                </div>
                <h2 class="mt-2 text-lg font-semibold text-gray-800">Voir Utilisateurs</h2>
              </button>
            </a>
          @else
            
            <a href="{{ route('internet') }}" class="w-full">
              <button class="bg-white rounded-lg shadow-lg p-5 text-center transition-shadow hover:shadow-2xl hover:scale-105 w-full h-full">
                <div class="flex items-center justify-center mb-2">
                  <i class="fa-solid fa-globe text-6xl text-blue-800"></i>
                </div>
                <h2 class="mt-2 text-lg font-semibold text-gray-800">Achat Internet</h2>
              </button>
            </a>

            <a href="{{ route('recharge.show') }}" class="w-full">
              <button class="bg-white rounded-lg shadow-lg p-5 text-center transition-shadow hover:shadow-2xl hover:scale-105 w-full h-full">
                <div class="flex items-center justify-center mb-2">
                  <i class="fa fa-refresh text-6xl text-blue-800" aria-hidden="true"></i>
                </div>
                <h2 class="mt-2 text-lg font-semibold text-gray-800">Recharge Solde</h2>
              </button>
            </a>

            <a href="{{ route('facture') }}" class="w-full">
              <button class="bg-white rounded-lg shadow-lg p-5 text-center transition-shadow hover:shadow-2xl hover:scale-105 w-full h-full">
                <div class="flex items-center justify-center mb-2">
                  <i class="fa-solid fa-file-invoice text-6xl text-blue-800"></i>
                </div>
                <h2 class="mt-2 text-lg font-semibold text-gray-800">Paiement Facture</h2>
              </button>
            </a>
          @endif
        </div>
      </div>
    </x-carousel>
  </x-nav>
</x-footer>
