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
        Schema::connection('mongodb')->create('company', function (Blueprint $collection) {
            $collection->index('id'); // index on id for faster lookup
            $collection->string('content')->nullable();
            $collection->string('name')->nullable();
            $collection->string('phone')->nullable();
            $collection->string('ulpad')->nullable();
            $collection->string('url')->nullable();
            $collection->integer('ad_id')->nullable();
            $collection->integer('popup_id')->nullable();
            $collection->string('right_ad_image')->nullable();
            $collection->timestamps(); // created_at, updated_at (optional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('company');
    }
};
