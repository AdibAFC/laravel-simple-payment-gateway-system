<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained('merchants')->onDelete('cascade');
            $table->foreignId('bank_id')->constrained('banks');
            $table->foreignId('pos_id')->constrained('pos');
            $table->foreignId('currency_id')->constrained('currencies');
            $table->string('account_no', 50);
            $table->decimal('amount', 15, 2);
            $table->decimal('net_amount', 15, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('transactions');
    }
};

