<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankAccountController;




Route::get('/', fn() => redirect('/accounts'));

Route::resource('accounts', BankAccountController::class)->except(['edit', 'update', 'destroy']);

Route::post('/accounts/{id}/deposit', [BankAccountController::class, 'deposit'])->name('accounts.deposit');
Route::post('/accounts/{id}/withdraw', [BankAccountController::class, 'withdraw'])->name('accounts.withdraw');


Route::prefix('/accounts')->controller(App\Http\Controllers\BankAccountController::class)
    ->name('account.')
    ->group(function () {
        Route::get('showTransaction/{id}','getTransactioninfo')->name('transaction');
        Route::get('show/{id}','show')->name('show');
     });