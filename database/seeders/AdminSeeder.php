<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Admin::create([
        'name' => 'akhsan',
        'email' => 'kholifahakhsan@gmail.com',
        'password' => bcrypt('12345'),
    ]);
    Admin::create([
        'name' => 'yanto',
        'email' => 'yanto@gmail.com',
        'password' => bcrypt('12345'),
    ]);
    Admin::create([
        'name' => 'edi',
        'email' => 'ediedi@gmail.com',
        'password' => bcrypt('12345'),
    ]);
    }
}
