<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Admin::factory()->create([
            'name' => 'Laravel Rajkot',
            'email' => 'admin@freshbits.in',
            'password' => bcrypt('123456'),
        ]);
        $this->command->info('Admin created successfully');
    }
}
