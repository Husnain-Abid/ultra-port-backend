<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create demo users
        DB::table('users')->insert([
            [
                'name' => 'Demo User 1',
                'email' => 'demo1@example.com',
                'password' => Hash::make('password'), // Use a secure password
                'remember_token' => Str::random(10), // Optional: for remember me functionality
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Demo User 2',
                'email' => 'demo2@example.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Demo User 3',
                'email' => 'demo3@example.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
