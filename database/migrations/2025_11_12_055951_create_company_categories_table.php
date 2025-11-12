<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('company_categories', function (Blueprint $collection) {
            $collection->index('id'); // index on id for faster lookup
            $collection->string('name')->nullable();
            $collection->string('description')->nullable();
            $collection->string('slug')->nullable();
            $collection->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $collection->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('company_categories');
    }
};
