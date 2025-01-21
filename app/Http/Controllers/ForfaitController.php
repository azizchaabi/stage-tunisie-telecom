<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;

class ForfaitController extends Controller
{
    public function showForfaits()
    {
        $forfaitPrices = [
            '75Mo' => 0.35,
            '220Mo' => 1.00,
            '500Mo' => 2.30,
            '880Mo' => 4.00,
            '1.25Go' => 5.00,
            '2.8Go' => 10.00,
            '6Go' => 15.00,
            '10Go' => 20.00,
        ];

        return view('internet', compact('forfaitPrices'));
    }

    public function purchaseForfait(Request $request)
    {
        $request->validate(['forfait' => 'required']);

        $forfaitPrices = [
            '75Mo' => 0.35,
            '220Mo' => 1.00,
            '500Mo' => 2.30,
            '880Mo' => 4.00,
            '1.25Go' => 5.00,
            '2.8Go' => 10.00,
            '6Go' => 15.00,
            '10Go' => 20.00,
        ];

        $selectedForfait = $request->input('forfait');
        $price = $forfaitPrices[$selectedForfait] ?? 0;

        $user = Auth::user();

        if ($user->solde < $price) {
            return back()->with('error', 'Solde insuffisant.');
        }

        
        $user->solde -= $price;
        $user->save();

        
        Purchase::create([
            'user_id' => $user->id,
            'forfait' => $selectedForfait,
            'amount' => $price,
        ]);

        return back()->with('success', 'Forfait activé avec succès');
    }

    public function showPurchaseHistory()
    {
        $user = Auth::user();
        $purchases = Purchase::where('user_id', $user->id)->get();

        return view('purchase_history', compact('purchases'));
    }
}
