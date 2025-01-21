<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.add')->with('success', 'Admin ajouté avec succées!');
    }

    
    public function showUsers()
    {
        $users = User::all(); 
        return view('users', compact('users')); 
    }

    
    public function createInvoice($user_id)
    {
        return view('createinvoice', compact('user_id')); 
    }

   
    public function storeInvoice(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'user_id' => 'required|exists:users,id', 
        ]);

        Invoice::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'due_date' => $request->due_date,
            'user_id' => $request->user_id, 
        ]);

        return redirect()->route('admin.users')->with('success', 'Facture crée avec succés');
    }

   
    public function editUser($user_id)
    {
        $user = User::findOrFail($user_id); 
        return view('edituser', compact('user')); 
    }

    
    public function updateUser(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id); 

        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.users')->with('success', 'Utilisateur mis à jour avec succès');
    }

   
    public function deleteUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete(); 
        
        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès');
    }
}
