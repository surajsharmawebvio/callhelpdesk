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
        Schema::table('company_requests', function (Blueprint $table) {
            $table->renameColumn('logo_path', 'document_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_requests', function (Blueprint $table) {
            $table->renameColumn('document_path', 'logo_path');
        });
    }
};
