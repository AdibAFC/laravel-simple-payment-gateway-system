<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->enum('status', ['most active','moderate active','inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('merchants');
    }
};
