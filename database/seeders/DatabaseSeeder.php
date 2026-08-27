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
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@jwc-sy.com'],
            [
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('jwc_admin159'),
            ]
        );

        \App\Models\User::updateOrCreate(
            ['email' => 'admin@jwc.sa'],
            [
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('jwc_admin159'),
            ]
        );
    }
}
