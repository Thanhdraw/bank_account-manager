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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('number_account', 10)->unique();
            $table->string('email')->unique()->nullable();
            $table->string('citizen_identification')->unique()->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('image')->nullable();
            $table->string('owner_name');
            $table->string('password', 100);
            $table->integer('number_of_transaction')->default(0);
            $table->tinyInteger('status')->nullable(); //enum
            $table->tinyInteger('type')->nullable(); //enum type 
            $table->decimal('balance', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};