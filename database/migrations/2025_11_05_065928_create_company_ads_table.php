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
        Schema::connection('mongodb')->create('company_ads', function (Blueprint $collection) {
            $collection->index('id'); // optional index for faster lookups
            $collection->integer('company_id')->nullable();
            $collection->string('image_path')->nullable();
            $collection->string('phone')->nullable();
            $collection->string('title')->nullable();
            $collection->timestamps(); // optional for created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('company_ads');
    }
};
