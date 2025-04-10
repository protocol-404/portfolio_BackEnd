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
        Schema::table('skills', function (Blueprint $table) {
            // Add category field if it doesn't exist
            if (!Schema::hasColumn('skills', 'category')) {
                $table->string('category')->nullable()->after('name');
            }
            
            // Add description field if it doesn't exist
            if (!Schema::hasColumn('skills', 'description')) {
                $table->text('description')->nullable()->after('proficiency');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            // Drop the columns if they exist
            if (Schema::hasColumn('skills', 'category')) {
                $table->dropColumn('category');
            }
            
            if (Schema::hasColumn('skills', 'description')) {
                $table->dropColumn('description');
            }
        });
    }
};
