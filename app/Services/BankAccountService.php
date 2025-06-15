<?php
namespace App\Services;

use App\logic\BankAccountLogic;
use App\Models\BankAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BankAccountService
{

    public function deposit(BankAccount $account, float $amount): array
    {
        DB::beginTransaction();
        try {
            $transactionService = new TransactionService();
            $bussinessLogic = new BankAccountLogic($account, $transactionService);
            $newbalance = $bussinessLogic->deposit($amount);

            DB::commit();
            return $this->successResponse(
                'Nạp tiền thành công. Số dư mới: ' . number_format($newbalance, 0, ',', '.') . 'đ',
                $newbalance
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse('Nạp tiền thất bại: ' . $th->getMessage());
        }


    }

    public function withdraw(BankAccount $account, float $amount): array
    {
        DB::beginTransaction();
        try {
            $transactionService = new TransactionService();
            $bussinessLogic = new BankAccountLogic($account, $transactionService);
            $newbalance = $bussinessLogic->withdraw($amount);
            DB::commit();

            return $this->successResponse(
                'Rút tiền thành công. Số dư còn lại: ' . number_format($newbalance, 0, ',', '.') . 'đ',
                $newbalance
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse('Rút tiền thất bại: ' . $th->getMessage());
        }
    }


    public function getInfoTransaction(BankAccount $account): array
    {
        DB::beginTransaction();
        try {
            $transactionService = new TransactionService();
            $bussinessLogic = new BankAccountLogic($account, $transactionService);
            $info = $bussinessLogic->getInfoTransaction();
            DB::commit();
           return [
            'status' => 'success',
            'message' => 'Lấy thông tin tài khoản thành công',
            'data' => $info,
        ];
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse(
                'error' . $th->getMessage()
            );
        }
    }

    private function successResponse(string $message, float $balance): array
    {
        return [
            'status' => 'success',
            'message' => $message,
            'balance' => $balance,
        ];
    }

    private function errorResponse(string $message): array
    {
        return [
            'status' => 'error',
            'message' => $message,
        ];
    }

}