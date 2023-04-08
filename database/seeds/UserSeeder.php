<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123')
        ]);

        DB::table('users')->insert([
            'name' => 'hrd',
            'email' => 'hrd@gmail.com',
            'role' => 'hrd',
            'password' => Hash::make('hrd123')
        ]);

        DB::table('users')->insert([
            'name' => 'direksi',
            'email' => 'direksi@gmail.com',
            'role' => 'direksi',
            'password' => Hash::make('direksi123')
        ]);

        DB::table('users')->insert([
            'name' => 'developer',
            'email' => 'developer@gmail.com',
            'role' => 'divisi',
            'password' => Hash::make('developer123')
        ]);
    }
}
