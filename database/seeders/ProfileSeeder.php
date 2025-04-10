<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'full_name' => 'John Doe',
            'title' => 'Full Stack Developer',
            'bio' => 'Experienced software developer with a passion for creating elegant, efficient, and user-friendly web applications. Proficient in both front-end and back-end technologies.',
            'email' => 'johndoe@example.com',
            'phone' => '+1234567890',
            'location' => 'New York, USA',
            'github' => 'https://github.com/johndoe',
            'linkedin' => 'https://linkedin.com/in/johndoe',
            'website' => 'https://johndoe.dev',
            'twitter' => 'https://twitter.com/johndoe',
        ]);
    }
}
