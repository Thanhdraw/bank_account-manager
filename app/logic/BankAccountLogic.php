<?php

namespace App\logic;

use App\Enums\StatusTransaction;
use App\Enums\TypeTransaction;
use App\Models\BankAccount;
use App\Models\Transaction;
use App\Services\TransactionService;

class BankAccountLogic extends BaseAccount
{
    private $dailyWithdrawLimit = 5000000;
    public function getDailyWithdraw()
    {
        return $this->dailyWithdrawLimit;
    }
    public function setDailyWithdraw($newDailyWithdraw)
    {
        return $this->dailyWithdrawLimit = $newDailyWithdraw;
    }


    protected BankAccount $bankAccount;
    public function __construct(BankAccount $bankAccount, TransactionService $transaction)
    {
        parent::__construct($bankAccount, $transaction);
    }

    // METHOD AN TOÀN để gửi tiền
    public function deposit(float $amount): float
    {
        if (!is_numeric($amount) || $amount <= 0) {
            throw new \InvalidArgumentException('Số tiền phải hợp lệ');
        }

        $this->account->balance += $amount;
        $this->account->save();


        $this->transactionService->createTransaction([
            'bank_account_id' => $this->account->id,
            'type' => TypeTransaction::Deposit,
            'status' => StatusTransaction::Success,
            'amount' => $amount,
            'balance_after' => $this->account->balance,
        ]);

        return $this->account->getBalance();


    }

    public function withdraw(float $amount): float
    {

        if ($this->account->getBalance() < $amount) {

            throw new \Exception('Số dư không đủ');
        }

        if ($amount > $this->dailyWithdrawLimit) {
            throw new \Exception('Vượt hạn mức ' . number_format($this->dailyWithdrawLimit));
        }

        $this->account->balance -= $amount;
        $this->account->save();

        $this->transactionService->createTransaction([
            'bank_account_id' => $this->account->id,
            'type' => TypeTransaction::Withdraw,
            'status' => StatusTransaction::Success,
            'amount' => $amount,
            'balance_after' => $this->account->balance,
        ]);

        return $this->account->getBalance();
    }

    public function getInfoTransaction()
    {
        return Transaction::where('bank_account_id', $this->account->id)
            ->whereIn('type', [TypeTransaction::Deposit, TypeTransaction::Withdraw])
            ->orderByDesc('created_at')
            ->get()
            ->toArray();
    }



}