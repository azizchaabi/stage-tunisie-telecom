<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Internet routes
Route::middleware('auth')->group(function () {
    Route::get('/internet', [ForfaitController::class, 'showForfaits'])->name('internet');
    Route::post('/internet', [ForfaitController::class, 'purchaseForfait'])->name('internet.purchase');
    Route::get('/purchase-history', [ForfaitController::class, 'showPurchaseHistory'])->name('purchase.history');
});

// Recharge routes
Route::middleware('auth')->group(function () {
    Route::get('/recharge', [RechargeController::class, 'showRechargeForm'])->name('recharge.show');
    Route::post('/recharge', [RechargeController::class, 'recharge'])->name('recharge');
});

// Admin routes
Route::get('/admin/register', function () {
    return view('adminregister'); 
})->name('admin.add');

Route::post('/admin/register', [AdminController::class, 'create']);

// Admin dashboard route
Route::get('/admin', function () {
    return view('admin'); 
})->name('admin.dashboard');

// Route to view users
Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');

// Route to create an invoice
Route::get('/admin/invoice/create/{user_id}', [AdminController::class, 'createInvoice'])->name('invoice.create');
Route::post('/admin/invoice/store', [AdminController::class, 'storeInvoice'])->name('invoice.store');

// Edit User
Route::get('/admin/users/edit/{user_id}', [AdminController::class, 'editUser'])->name('user.edit');
Route::put('/admin/users/update/{user_id}', [AdminController::class, 'updateUser'])->name('user.update');

// Delete User
Route::delete('/admin/users/delete/{user_id}', [AdminController::class, 'deleteUser'])->name('user.delete');

// Admin logout route
Route::post('/admin/logout', [AuthenticatedSessionController::class, 'adminLogout'])->name('admin.logout');

// Login routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Logout route for  users
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Invoice routes
Route::middleware('auth')->group(function () {
    Route::get('/facture', [InvoiceController::class, 'index'])->name('facture');
    Route::post('/facture/payment', [InvoiceController::class, 'processPayment'])->name('facture.payment.submit');
});


require __DIR__.'/auth.php';
