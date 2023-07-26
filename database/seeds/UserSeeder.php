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
            'password' => Hash::make('admin123'),
            'division_name' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'hrd',
            'email' => 'hrd@gmail.com',
            'role' => 'hrd',
            'password' => Hash::make('hrd123'),
            'division_name' => 'hrd'
        ]);

        DB::table('users')->insert([
            'name' => 'direksi',
            'email' => 'direksi@gmail.com',
            'role' => 'direksi',
            'password' => Hash::make('direksi123'),
            'division_name' => 'direksi'
        ]);

        DB::table('users')->insert([
            'name' => 'developer',
            'email' => 'developer@gmail.com',
            'role' => 'divisi',
            'password' => Hash::make('developer123'),
            'division_name' => 'developer'
        ]);

        DB::table('users')->insert([
            'name' => 'akuntan',
            'email' => 'akuntan@gmail.com',
            'role' => 'divisi',
            'password' => Hash::make('akuntan123'),
            'division_name' => 'akuntan'
        ]);

        DB::table('users')->insert([
            'name' => 'rizqi',
            'email' => 'rizqi@gmail.com',
            'role' => 'pelamar',
            'password' => Hash::make('rizqi123'),
            'division_name' => ''
        ]);
        DB::table('users')->insert([
            'name' => 'bima',
            'email' => 'bima@gmail.com',
            'role' => 'pelamar',
            'password' => Hash::make('bima123'),
            'division_name' => ''
        ]);
        DB::table('users')->insert([
            'name' => 'ical',
            'email' => 'ical@gmail.com',
            'role' => 'pelamar',
            'password' => Hash::make('ical123'),
            'division_name' => ''
        ]);
        DB::table('users')->insert([
            'name' => 'heli',
            'email' => 'heli@gmail.com',
            'role' => 'pelamar',
            'password' => Hash::make('heli123'),
            'division_name' => ''
        ]);
        DB::table('users')->insert([
            'name' => 'angel',
            'email' => 'angel@gmail.com',
            'role' => 'pelamar',
            'password' => Hash::make('angel123'),
            'division_name' => ''
        ]);
    }
}
