<?php

namespace App\Models;

use App\Enums\StatusAccount;
use App\Enums\TypeAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BankAccount extends Model
{

    protected $table = 'bank_accounts';
    protected $fillable = ['owner_name', 'number_account', 'password', 'balance', 'status'];


    protected $casts = [
        'status' => StatusAccount::class,
        'type' => TypeAccount::class
    ];

    public function getNumberTransaction()
    {
        return $this->number_of_transaction;
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
    public function getStatusAccount(): ?StatusAccount
    {
        return $this->status;
    }
    public function setStatusAccount(StatusAccount $statusAccount)
    {
        return $this->status = $statusAccount;
    }

    // Loại tài khoản
    public function setTypeAccout(TypeAccount $typeAccount)
    {
        return $this->type = $typeAccount;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($account) {
            $account->generateNumberAccount();
            $account->balance = 0;
            $account->setStatusAccount(StatusAccount::Active);
            $account->setTypeAccout(TypeAccount::Basic);

        });
    }

    public function checkAccountNumber($number)
    {
        return DB::table('bank_accounts')->where('number_account', $number)->exists();
    }

    public function generateNumberAccount()
    {
        do {
            $generatedNumber = str_pad(rand(0, max: 9999999999), 10, '0', STR_PAD_LEFT);

        } while ($this->checkAccountNumber($generatedNumber));

        $this->number_account = $generatedNumber;

        return $this;
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}