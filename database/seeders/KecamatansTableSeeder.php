<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatans = [
            ['id' => 1, 'name' => 'Banjarmasin Utara', 'color' => '#C85C5C'],
            ['id' => 2, 'name' => 'Banjarmasin Barat', 'color' => '#F9975D'],
            ['id' => 3, 'name' => 'Banjarmasin Selatan', 'color' => '#FBD148'],
            ['id' => 4, 'name' => 'Banjarmasin Tengah', 'color' => '#B2EA70'],
            ['id' => 5, 'name' => 'Banjarmasin Timur', 'color' => '#A86DF5'],
        ];
        Kecamatan::insert($kecamatans);
    }
}
