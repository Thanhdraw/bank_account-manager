<?php
namespace App\Services;

use App\logic\BankAccountLogic;
use App\Models\BankAccount;
use Illuminate\Support\Facades\DB;

class BankAccountService
{

    public function deposit(BankAccount $account, float $amount): array
    {
        DB::beginTransaction();
        try {
            $bussinessLogic = new BankAccountLogic($account);

            $newbalance = $bussinessLogic->deposit($amount);

            DB::commit();
            return [
                'status' => 'success',
                'message' => 'Nạp tiền thành công.',
                'balance' => $newbalance,
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return [
                'status' => 'error',
                'message' => 'Giao dịch thất bại: ' . $th->getMessage(),
            ];
        }

    }

    public function withdraw(BankAccount $account, float $amount): array
    {
        DB::beginTransaction();
        try {
            $bussinessLogic = new BankAccountLogic($account);
            $newbalance = $bussinessLogic->withdraw($amount);
            DB::commit();
            return [
                'status' => 'success',
                'message' => 'Rút tiền thành công',
                'balance' => $newbalance
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'status' => 'error',
                'message' => 'Giao dịch thất bại' . $th->getMessage(),
            ];
        }
    }

}