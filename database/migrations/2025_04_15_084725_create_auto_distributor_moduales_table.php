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
        Schema::create('auto_distributor_moduales', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Auto Distributor');
            $table->string('description')->nullable();
            $table->integer('max_calls')->nullable();
            $table->integer('max_agents')->nullable();
            $table->boolean('enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_distributor_moduales');
    }
};
