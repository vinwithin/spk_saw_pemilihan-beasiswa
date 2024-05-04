<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('tb_kriteria')->insert([
            [
                
                'nama_kriteria' => 'Nilai Raport',
                'atribut' => 'Benefit',
                'bobot' => 0.5,
            ],
            [
                
                'nama_kriteria' => 'Penghasilan Orang Tua',
                'atribut' => 'Cost',
                'bobot' => 0.25,
            ],
            [
                
                'nama_kriteria' => 'Tanggungan Orang Tua',
                'atribut' => 'Benefit',
                'bobot' => 0.25,
            ],
        ]);
    }
}
