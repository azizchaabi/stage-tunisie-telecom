<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RechargeController extends Controller
{
    public function showRechargeForm()
    {
        
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to recharge your balance.');
        }

        return view('recharge');
    }

    public function recharge(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $user = Auth::user();
        $user->solde += $request->input('amount');
        $user->save();

        return back()->with('success', 'Solde rechargé!');
    }
}
