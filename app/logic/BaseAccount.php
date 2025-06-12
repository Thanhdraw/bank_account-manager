<?php

namespace App\logic;

use App\Models\BankAccount;
use App\Models\Transaction;

abstract class BaseAccount
{
    protected BankAccount $account;

    public function __construct(BankAccount $account)
    {
        $this->account = $account;

    }

    // Đây là method trừu tượng, bắt buộc class con phải implement
    // Abstract methods
    abstract public function withdraw(float $amount): float;
    abstract public function deposit(float $amount): float;
}