<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin One',
                'email' => 'admin1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Two',
                'email' => 'admin2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User One',
                'email' => 'user1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Two',
                'email' => 'user2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Three',
                'email' => 'user3@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Four',
                'email' => 'user4@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Five',
                'email' => 'user5@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
