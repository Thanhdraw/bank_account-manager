<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankAccountController;




Route::get('/', fn() => redirect('/accounts'));

Route::resource('accounts', BankAccountController::class)->except(['edit', 'update', 'destroy']);

Route::post('/accounts/{account}/deposit', [BankAccountController::class, 'deposit'])->name('accounts.deposit');
Route::post('/accounts/{account}/withdraw', [BankAccountController::class, 'withdraw'])->name('accounts.withdraw');