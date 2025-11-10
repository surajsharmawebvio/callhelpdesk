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
        Schema::connection('mongodb')->create('company_posts', function (Blueprint $collection) {
            $collection->index('id'); // index for faster search
            $collection->integer('company_id')->nullable();
            $collection->string('image_path')->nullable();
            $collection->string('title')->nullable();
            $collection->string('url')->nullable();
            $collection->timestamps(); // optional (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('company_posts');
    }
};
