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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('phone', 50)->nullable();
            $table->text('ulpad')->nullable();
            $table->text('url')->nullable();
            $table->integer('ad_id')->nullable();
            $table->integer('popup_id')->nullable();
            $table->string('right_ad_image')->nullable();
            $table->boolean('published')->default(false);
            $table->unsignedBigInteger('company_category_id')->nullable();
            $table->timestamps();
            
            $table->index('name');
            $table->index('published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
