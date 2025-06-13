<?php

namespace App\Models;

use App\Enums\StatusTransaction;
use App\Enums\TypeTransaction;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transactions';
    protected $fillable = ['type', 'status', 'amount', 'balance_after', 'bank_account_id'];

    protected $casts = [
        'type' => \App\Enums\TypeTransaction::class,
        'status' => \App\Enums\StatusTransaction::class,
    ];


    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

}