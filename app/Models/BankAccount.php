<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BankAccount extends Model
{

    protected $table = 'bank_accounts';
    protected $fillable = ['owner_name', 'number_account', 'password', 'balance'];
    private $dailyWithdrawLimit = 5000000;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($account) {
            $account->generateNumberAccount();
            $account->balance = 0;
        });
    }

    public function getBalance()
    {
        return $this->balance ?? 0;
    }
    public function getFreshBalance()
    {
        $this->refresh();
        return $this->balance ?? 0;
    }

    // METHOD AN TOÀN để gửi tiền
    public function deposit($amount)
    {
        if (!(is_numeric($amount)) || $amount < 0) {
            throw new \InvalidArgumentException('Số tiền phải là số và lớn hơn 0.');
        }
        $this->balance = $this->getBalance() + $amount;
        $this->save();
        return $this->getBalance();
    }

    public function withdraw($amount)
    {
        if ($this->getBalance() < $amount) {
            // dd($this->balance);


            throw new \Exception('Số dư không đủ');
        }
        if ($amount > $this->getDailyWithdraw()) {
            throw new \Exception('Vượt hạn mức cho phép ' . number_format($this->getDailyWithdraw()) . ' VNĐ');
        }
        $this->balance = $this->getBalance() - $amount;
        $this->save();
        return $this->getBalance();
    }

    // Hạn mức rút tiền
    public function getDailyWithdraw()
    {
        return $this->dailyWithdrawLimit;
    }
    public function setDailyWithdraw($newDailyWithdraw)
    {
        return $this->dailyWithdrawLimit = $newDailyWithdraw;
    }
    public function generateNumberAccount()
    {
        do {
            $generatedNumber = str_pad(rand(0, max: 9999999999), 10, '0', STR_PAD_LEFT);

        } while (DB::table('bank_accounts')->where('number_account', $generatedNumber)->exists());
        $this->number_account = $generatedNumber;
        return $this;
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}