<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('user_id', auth()->id())
                           ->where('is_paid', false)
                           ->get();
        return view('facture', compact('invoices'));
    }

    public function processPayment(Request $request)
{
    $request->validate([
        'invoice_id' => 'required|exists:invoices,id',
    ]);

    $invoice = Invoice::findOrFail($request->invoice_id);
    $user = auth()->user();

    if ($user->solde < $invoice->amount) {
        return redirect()->route('facture')->with('error', 'Solde insuffisant pour payer cette facture.');
    }

    
    $user->solde -= $invoice->amount;
    $user->save();

   
    $invoice->is_paid = true;
    $invoice->save();

    return redirect()->route('facture')->with('success', 'Facture payée avec succès!');
}


}
