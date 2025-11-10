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
        Schema::connection('mongodb')->create('company_suggestions', function (Blueprint $collection) {
            $collection->index('id');
            $collection->string('name')->nullable();
            $collection->string('email')->nullable();
            $collection->string('suggestion_name')->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('company_suggestions');
    }
};
