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
       
        $this->call(KelasSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(TahunajarSeeder::class);
        $this->call(JadwalSeeder::class);
        $this->call(AbsensiSeeder::class);

        User::create([
            'name' => 'akhsan',
            'email' => 'kholifahakhsan@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('1'),
        ]);

        User::create([
            'name' => 'Juairia, S.P',
            'email' => 'juairia@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Siti Kholijah, S.Pd',
            'email' => 'siti@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        // User::create([
        //     'name' => 'l09kl%hj83#0',
        //     'email' => 'norse.sanz@gmail.com',
        //     'role' => 'admin',
        //     'password' => bcrypt('sanzsantuy'),
        // ]);

        User::create([
            'name' => 'Ali Bashori, S.Pd, M.Pd',
            'email' => 'ali@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Indah Mustika Rini, S.Ag',
            'email' => 'indah@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Asnawi, S.Ag',
            'email' => 'asnawi@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Makhdi, S.Ag',
            'email' => 'makhdi@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Jamin, S.Pd.I',
            'email' => 'jamin@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Ishar, S.Pd.I',
            'email' => 'ishar@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Neneng Ernawati, S.Pd.I',
            'email' => 'neneng@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Kasiman, S.Pd.I',
            'email' => 'kasiman@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Marlina, S.Pd.I',
            'email' => 'marlina@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Sri Wahyuni, S.E',
            'email' => 'sri@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Sagiati, S.Ag',
            'email' => 'sagiati@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('password'),
        ]);
    }
}
