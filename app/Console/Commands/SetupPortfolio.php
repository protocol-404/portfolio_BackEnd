<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupPortfolio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'portfolio:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the portfolio with fresh migrations and seeding';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Running migrations...');
        Artisan::call('migrate:fresh', ['--force' => true]);
        $this->info('Migrations completed.');

        $this->info('Seeding profile...');
        Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\ProfileSeeder', '--force' => true]);
        $this->info('Profile seeded.');

        $this->info('Portfolio setup completed successfully!');
    }
}
