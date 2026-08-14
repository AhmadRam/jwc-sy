<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if admin exists
        if (!\App\Models\User::where('email', 'admin@jwc.sa')->exists()) {
            \App\Models\User::create([
                'name' => 'Admin',
                'email' => 'admin@jwc.sa',
                'password' => bcrypt('jwc_admin159'),
            ]);
        }
    }
}
