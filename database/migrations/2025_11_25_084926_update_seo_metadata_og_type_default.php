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
        // Update existing null og_type values to 'website'
        DB::table('seo_metadata')->whereNull('og_type')->update(['og_type' => 'website']);
        
        // Also set default values for other nullable fields if needed
        DB::table('seo_metadata')->whereNull('index')->update(['index' => true]);
        DB::table('seo_metadata')->whereNull('follow')->update(['follow' => true]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally revert the changes (set back to null)
        DB::table('seo_metadata')->where('og_type', 'website')->update(['og_type' => null]);
        DB::table('seo_metadata')->where('index', true)->update(['index' => null]);
        DB::table('seo_metadata')->where('follow', true)->update(['follow' => null]);
    }
};
