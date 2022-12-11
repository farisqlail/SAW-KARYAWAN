<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name_role' => 'admin',
            ],
            [
                'name_role' => 'direksi',
            ],
            [
                'name_role' => 'hrd',
            ],
            [
                'name_role' => 'divisi',
            ]
        ]);
    }
}
