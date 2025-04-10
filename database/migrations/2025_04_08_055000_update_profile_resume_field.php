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
        Schema::table('profiles', function (Blueprint $table) {
            // If the resume column exists, rename it to resume_url
            if (Schema::hasColumn('profiles', 'resume')) {
                $table->renameColumn('resume', 'resume_url');
            } else {
                // If resume doesn't exist but resume_url doesn't either, add resume_url
                if (!Schema::hasColumn('profiles', 'resume_url')) {
                    $table->string('resume_url')->nullable();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // If resume_url exists, rename it back to resume
            if (Schema::hasColumn('profiles', 'resume_url')) {
                $table->renameColumn('resume_url', 'resume');
            }
        });
    }
};
