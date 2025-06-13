<?php


namespace App\Services;

use App\Models\Transaction;

class TransactionService
{
    public function createTransaction(array $data): Transaction
    {
        if (!isset($data['bank_account_id'], $data['type'], $data['status'], $data['amount'], $data['balance_after'])) {
            throw new \InvalidArgumentException('Thiếu dữ liệu để tạo giao dịch');
        }


        return Transaction::create([
            'bank_account_id' => $data['bank_account_id'],
            'type' => $data['type']->value,
            'status' => $data['status']->value,
            'amount' => $data['amount'],
            'balance_after' => $data['balance_after'],
        ]);
    }
}