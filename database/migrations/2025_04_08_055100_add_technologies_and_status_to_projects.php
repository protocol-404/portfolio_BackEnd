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
        Schema::table('projects', function (Blueprint $table) {
            // Add technologies field if it doesn't exist
            if (!Schema::hasColumn('projects', 'technologies')) {
                $table->text('technologies')->nullable()->after('completed_date');
            }
            
            // Add status field if it doesn't exist
            if (!Schema::hasColumn('projects', 'status')) {
                $table->string('status')->default('completed')->after('technologies');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop the columns if they exist
            if (Schema::hasColumn('projects', 'technologies')) {
                $table->dropColumn('technologies');
            }
            
            if (Schema::hasColumn('projects', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
