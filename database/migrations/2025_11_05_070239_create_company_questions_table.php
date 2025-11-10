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
        Schema::connection('mongodb')->create('company_questions', function (Blueprint $collection) {
            $collection->index('id'); // useful for fast lookups
            $collection->integer('company_id')->nullable();
            $collection->string('question')->nullable();
            $collection->string('answer')->nullable();
            $collection->timestamps(); // optional: created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('company_questions');
    }
};
