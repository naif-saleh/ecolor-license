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
        Schema::create('licens', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('enabled')->default(false);
            $table->string('license_key')->unique()->nullable();
            $table->enum('status', ['Active', 'Inactive', 'Expired'])->default('Inactive');
            $table->string('description')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('auto_dialer_id')->nullable()->constrained('auto_dialer_modules')->onDelete('cascade');
            $table->foreignId('auto_distributor_id')->nullable()->constrained('auto_distributor_moduales')->onDelete('cascade');
            $table->foreignId('evaluation_id')->nullable()->constrained('evaluation_moduales')->onDelete('cascade');
            $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licens');
    }
};
