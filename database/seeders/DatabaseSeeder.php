<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CategoryModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::create([
        //     'fullname' =>'officer',
        //     'username' => 'Firmansjah Taopik',
        //     'email' => "asdevubuntu1@gmail.com",
        //     'password' => bcrypt('asdevubuntu1@gmail.com'),
        //     'role' => 'OFFICER',
        // ]);
        // \App\Models\User::create([
        //     'username' => "Maman Bihun",
        //     'fullname' => "maman Gossling",
        //     'email' => "asdevubuntu@gmail.com",
        //     'password' => bcrypt("asdevubuntu@gmail.com"),
        //     'role' => 'USER',
        // ]);
        \App\Models\User::create([
            'username' => env('ADMIN_USERNAME'),
            'fullname' => 'Rio Putra Pratama',
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
            'role' => 'ADMIN',
        ]);
        // CategoryModel::create([
        //     "category_name"=>'filsafat'
        // ]);
        // CategoryModel::create([
        //     "category_name"=>'Law'
        // ]);
        // CategoryModel::create([
        //     "category_name"=>'Novel'
        // ]);
        // CategoryModel::create([
        //     "category_name"=>'Manga'
        // ]);
        // CategoryModel::create([
        //     "category_name"=>'Comics'
        // ]);
        // CategoryModel::create([
        //     "category_name"=>'Finance'
        // ]);
    }
}
