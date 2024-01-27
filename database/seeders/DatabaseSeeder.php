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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'username' => 'Firmansjah Taopik',
            'email' => "maman@mail.com",
            'password' => bcrypt('1234567'),
            'role' => 'OFFICER',
        ]);
        \App\Models\User::create([
            'username' => "Maman Bihun",
            'fullname' => "maman Gossling",
            'email' => "bihun@mail.com",
            'password' => bcrypt("1234567"),
            'role' => 'USER',
        ]);
        \App\Models\User::create([
            'username' => env('ADMIN_USERNAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'role' => 'ADMIN',
        ]);
    }
}
