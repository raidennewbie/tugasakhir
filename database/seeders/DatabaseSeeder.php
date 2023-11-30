<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(AdminSeeder::class);
        $this->call(KelasSeeder::class);

        User::create([
            'name' => 'akhsan',
            'email' => 'kholifahakhsan@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'yanto',
            'email' => 'yanto@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'ahmad',
            'email' => 'ahmad@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'merry',
            'email' => 'merry@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('123456'),
        ]);
    }
}
