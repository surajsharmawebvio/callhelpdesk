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
        Schema::table('seo_metadata', function (Blueprint $table) {
            // Make columns nullable that currently have defaults
            $table->string('og_type')->nullable()->default('website')->change();
            $table->string('twitter_card')->nullable()->default('summary_large_image')->change();
            $table->boolean('index')->nullable()->default(true)->change();
            $table->boolean('follow')->nullable()->default(true)->change();
            $table->string('locale')->nullable()->default('en_US')->change();
            $table->decimal('priority', 2, 1)->nullable()->default(0.5)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_metadata', function (Blueprint $table) {
            // Revert back to non-nullable with defaults
            $table->string('og_type')->default('website')->change();
            $table->string('twitter_card')->default('summary_large_image')->change();
            $table->boolean('index')->default(true)->change();
            $table->boolean('follow')->default(true)->change();
            $table->string('locale')->default('en_US')->change();
            $table->decimal('priority', 2, 1)->default(0.5)->change();
        });
    }
};
