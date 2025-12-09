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
        Schema::create('popular_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id');
            $table->integer('order')->default(0);
            $table->timestamps();

            // Note: Foreign key constraint commented out due to MySQL engine issues
            // $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popular_companies');
    }
};
