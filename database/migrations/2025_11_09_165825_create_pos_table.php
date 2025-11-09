<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->string('pos_name', 100);
            $table->decimal('commission_percentage', 5, 2)->default(0.00);
            $table->decimal('commission_fixed', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pos');
    }
};

