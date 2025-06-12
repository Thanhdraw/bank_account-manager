<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BankAccount extends Model
{

    protected $table = 'bank_accounts';
    protected $fillable = ['owner_name', 'number_account', 'password', 'balance'];

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

    // Hạn mức rút tiền

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