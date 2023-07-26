<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(LowonganSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(BobotKriteriaSeeder::class);
        $this->call(JadwalTesSeeder::class);
        $this->call(PelamarSeeder::class);
        $this->call(NilaiAlternatifSeeder::class);
        $this->call(DaftarSoalSeeder::class);
        $this->call(DetailJawabanSeeder::class);
    }
}
