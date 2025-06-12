<?php

namespace App\Models;

use App\Enums\StatusTransaction;
use App\Enums\TypeTransaction;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transactions';
    protected $fillable = ['type', 'status', 'amout', 'balance_after'];

    protected $casts = [
        'type' => TypeTransaction::class,
        'status' => StatusTransaction::class,
    ];

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

}