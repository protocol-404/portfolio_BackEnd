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
        Schema::table('profiles', function (Blueprint $table) {
            // Check if each column exists and add it if it doesn't
            if (!Schema::hasColumn('profiles', 'full_name')) {
                $table->string('full_name')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'title')) {
                $table->string('title')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'bio')) {
                $table->text('bio')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'avatar')) {
                $table->string('avatar')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'resume_url')) {
                $table->string('resume_url')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'email')) {
                $table->string('email')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'phone')) {
                $table->string('phone')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'location')) {
                $table->string('location')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'github')) {
                $table->string('github')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'linkedin')) {
                $table->string('linkedin')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'twitter')) {
                $table->string('twitter')->nullable();
            }
            
            if (!Schema::hasColumn('profiles', 'website')) {
                $table->string('website')->nullable();
            }
        });
        
        // Check if the table is empty and the required columns exist
        $profileCount = DB::table('profiles')->count();
        
        if ($profileCount == 0 && 
            Schema::hasColumn('profiles', 'full_name') && 
            Schema::hasColumn('profiles', 'title') && 
            Schema::hasColumn('profiles', 'bio') && 
            Schema::hasColumn('profiles', 'email')) {
            
            // Insert a default profile
            DB::table('profiles')->insert([
                'full_name' => 'Your Name',
                'title' => 'Web Developer',
                'bio' => 'A passionate web developer with experience in modern web technologies.',
                'email' => 'example@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No down action as we don't want to remove columns if they exist
    }
};
