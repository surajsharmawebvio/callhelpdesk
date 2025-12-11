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
        Schema::create('company_requests', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('category')->nullable();
            $table->text('address')->nullable();
            $table->string('country_code', 10);
            $table->string('country_name', 100);
            $table->string('phone');
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_requests');
    }
};
