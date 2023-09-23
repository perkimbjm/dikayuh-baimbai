<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;

class KelurahansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelurahans = [
            ['id' => 1, 'name' => 'Mantuil', 'slug' => 'mantuil', 'kecamatans_id' => 3],
            ['id' => 2, 'name' => 'Kelayan Selatan', 'slug' => 'kelayan-selatan', 'kecamatans_id' => 3],
            ['id' => 3, 'name' => 'Kelayan Timur', 'slug' => 'kelayan-timur', 'kecamatans_id' => 3],
            ['id' => 4, 'name' => 'Tanjung Pagar', 'slug' => 'tanjung-pagar', 'kecamatans_id' => 3],
            ['id' => 5, 'name' => 'Pemurus Dalam', 'slug' => 'pemurus-dalam', 'kecamatans_id' => 3],
            ['id' => 6, 'name' => 'Pemurus Baru', 'slug' => 'pemurus-baru', 'kecamatans_id' => 3],
            ['id' => 7, 'name' => 'Murung Raya', 'slug' => 'murung-raya', 'kecamatans_id' => 3],
            ['id' => 8, 'name' => 'Kelayan Dalam', 'slug' => 'kelayan-dalam', 'kecamatans_id' => 3],
            ['id' => 9, 'name' => 'Kelayan Tengah', 'slug' => 'kelayan-tengah', 'kecamatans_id' => 3],
            ['id' => 10, 'name' => 'Pekauman', 'slug' => 'pekauman', 'kecamatans_id' => 3],
            ['id' => 11, 'name' => 'Kelayan Barat', 'slug' => 'kelayan-barat', 'kecamatans_id' => 3],
            ['id' => 12, 'name' => 'Basirih Selatan', 'slug' => 'basirih-selatan', 'kecamatans_id' => 3],
            ['id' => 13, 'name' => 'Pekapuran Raya', 'slug' => 'pekapuran-raya', 'kecamatans_id' => 5],
            ['id' => 14, 'name' => 'Karang Mekar', 'slug' => 'karang-mekar', 'kecamatans_id' => 5],
            ['id' => 15, 'name' => 'Kebun Bunga', 'slug' => 'kebun-bunga', 'kecamatans_id' => 5],
            ['id' => 16, 'name' => 'Sungai Lulut', 'slug' => 'sungai-lulut', 'kecamatans_id' => 5],
            ['id' => 17, 'name' => 'Kuripan', 'slug' => 'kuripan', 'kecamatans_id' => 5],
            ['id' => 18, 'name' => 'Sungai Bilu', 'slug' => 'sungai-bilu', 'kecamatans_id' => 5],
            ['id' => 19, 'name' => 'Pengambangan', 'slug' => 'pengambangan', 'kecamatans_id' => 5],
            ['id' => 20, 'name' => 'Benua Anyar', 'slug' => 'benua-anyar', 'kecamatans_id' => 5],
            ['id' => 21, 'name' => 'Pemurus Luar', 'slug' => 'pemurus-luar', 'kecamatans_id' => 5],
            ['id' => 22, 'name' => 'Teluk Tiram', 'slug' => 'teluk-tiram', 'kecamatans_id' => 2],
            ['id' => 23, 'name' => 'Telawang', 'slug' => 'telawang', 'kecamatans_id' => 2],
            ['id' => 24, 'name' => 'Telaga Biru', 'slug' => 'telaga-biru', 'kecamatans_id' => 2],
            ['id' => 25, 'name' => 'Pelambuan', 'slug' => 'pelambuan', 'kecamatans_id' => 2],
            ['id' => 26, 'name' => 'Belitung Selatan', 'slug' => 'belitung-selatan', 'kecamatans_id' => 2],
            ['id' => 27, 'name' => 'Belitung Utara', 'slug' => 'belitung-utara', 'kecamatans_id' => 2],
            ['id' => 28, 'name' => 'Basirih', 'slug' => 'basirih', 'kecamatans_id' => 2],
            ['id' => 29, 'name' => 'Kuin Cerucuk', 'slug' => 'kuin-cerucuk', 'kecamatans_id' => 2],
            ['id' => 30, 'name' => 'Kuin Selatan', 'slug' => 'kuin-selatan', 'kecamatans_id' => 2],
            ['id' => 31, 'name' => 'Kelayan Luar', 'slug' => 'kelayan-luar', 'kecamatans_id' => 4],
            ['id' => 32, 'name' => 'Kertak Baru Ilir', 'slug' => 'kertak-baru-ilir', 'kecamatans_id' => 4],
            ['id' => 33, 'name' => 'Mawar', 'slug' => 'mawar', 'kecamatans_id' => 4],
            ['id' => 34, 'name' => 'Teluk Dalam', 'slug' => 'teluk-dalam', 'kecamatans_id' => 4],
            ['id' => 35, 'name' => 'Kertak Baru Ulu', 'slug' => 'kertak-baru-ulu', 'kecamatans_id' => 4],
            ['id' => 36, 'name' => 'Pekapuran Laut', 'slug' => 'pekapuran-laut', 'kecamatans_id' => 4],
            ['id' => 37, 'name' => 'Sungai Baru', 'slug' => 'sungai-baru', 'kecamatans_id' => 4],
            ['id' => 38, 'name' => 'Gadang', 'slug' => 'gadang', 'kecamatans_id' => 4],
            ['id' => 39, 'name' => 'Antasan Besar', 'slug' => 'antasan-besar', 'kecamatans_id' => 4],
            ['id' => 40, 'name' => 'Pasar Lama', 'slug' => 'pasar-lama', 'kecamatans_id' => 4],
            ['id' => 41, 'name' => 'Seberang Mesjid', 'slug' => 'seberang-mesjid', 'kecamatans_id' => 4],
            ['id' => 42, 'name' => 'Melayu', 'slug' => 'melayu', 'kecamatans_id' => 4],
            ['id' => 43, 'name' => 'Kuin Utara', 'slug' => 'kuin-utara', 'kecamatans_id' => 1],
            ['id' => 44, 'name' => 'Pangeran', 'slug' => 'pangeran', 'kecamatans_id' => 1],
            ['id' => 45, 'name' => 'Sungai Miai', 'slug' => 'sungai-miai', 'kecamatans_id' => 1],
            ['id' => 46, 'name' => 'Antasan Kecil Timur', 'slug' => 'antasan-kecil-timur', 'kecamatans_id' => 1],
            ['id' => 47, 'name' => 'Surgi Mufti', 'slug' => 'surgi-mufti', 'kecamatans_id' => 1],
            ['id' => 48, 'name' => 'Sungai Jingah', 'slug' => 'sungai-jingah', 'kecamatans_id' => 1],
            ['id' => 49, 'name' => 'Alalak Utara', 'slug' => 'alalak-utara', 'kecamatans_id' => 1],
            ['id' => 50, 'name' => 'Alalak Selatan', 'slug' => 'alalak-selatan', 'kecamatans_id' => 1],
            ['id' => 51, 'name' => 'Alalak Tengah', 'slug' => 'alalak-tengah', 'kecamatans_id' => 1],
            ['id' => 52, 'name' => 'Sungai Andai', 'slug' => 'sungai-andai', 'kecamatans_id' => 1],

        ];

        Kelurahan::insert($kelurahans);
    }
}
