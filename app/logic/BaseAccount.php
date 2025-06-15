<?php

namespace App\logic;

use App\Models\BankAccount;
use App\Models\Transaction;
use App\Services\TransactionService;

abstract class BaseAccount
{
    protected BankAccount $account;

    protected TransactionService $transactionService;

   

    public function __construct(BankAccount $account, TransactionService $transactionService)
    {
        $this->account = $account;
        $this->transactionService = $transactionService;

    }

    // Đây là method trừu tượng, bắt buộc class con phải implement
    // Abstract methods
    abstract public function withdraw(float $amount): float;
    abstract public function deposit(float $amount): float;
}