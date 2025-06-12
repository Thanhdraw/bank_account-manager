<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('status')->nullable(); //transaction status
            $table->decimal('amount', 15, 2); // số tiền giao dịch
            $table->decimal('balance_after', 15, 2); // số dư sau giao dịch
            $table->foreignId('bank_account_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};