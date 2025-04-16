<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auto_dialer_modules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Auto Dialer');
            $table->string('description')->nullable();
            $table->integer('max_channels')->nullable();
            $table->integer('max_providers')->nullable();
            $table->integer('max_calls')->nullable();
            $table->boolean('enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_dialer_modules');
    }
};
