<?php

namespace App\logic;

class BankAccountLogic extends BaseAccount
{

    private $dailyWithdrawLimit = 5000000;
    // METHOD AN TOÀN để gửi tiền
    public function deposit(float $amount): float
    {
        if (!is_numeric($amount) || $amount <= 0) {
            throw new \InvalidArgumentException('Số tiền phải hợp lệ');
        }

        $this->account->balance += $amount;
        $this->account->save();
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

        return $this->account->getBalance();
    }
    public function getDailyWithdraw()
    {
        return $this->dailyWithdrawLimit;
    }
    public function setDailyWithdraw($newDailyWithdraw)
    {
        return $this->dailyWithdrawLimit = $newDailyWithdraw;
    }
}