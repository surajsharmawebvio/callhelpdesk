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
        Schema::connection('mongodb')->create('inquiries', function (Blueprint $collection) {
            $collection->index('id'); // for faster lookups
            $collection->string('name')->nullable();
            $collection->string('email')->nullable();
            $collection->string('subject')->nullable();
            $collection->string('message')->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('inquiries');
    }
};
