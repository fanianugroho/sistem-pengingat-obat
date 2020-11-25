<?php

use Illuminate\Database\Seeder;
use App\KontraindikasiObat;
class KontraindikasiObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
                [
                    'nama_kontraindikasi' => 'Ibu Hamil',
                ],
                [
                    'nama_kontraindikasi' => 'Blok jantung',
                ],
                [
                    'nama_kontraindikasi' => 'Kerusakan miokard',
                ],
                [
                    'nama_kontraindikasi' => 'Penggunaan inhibitor CYP3A4 yang kuat',
                ],
                [
                    'nama_kontraindikasi' => 'Hipersensitivitas',
                ],
                [
                    'nama_kontraindikasi' => 'Penyakit liver aktif',
                ],
        ];
          KontraindikasiObat::insert($data);
    }
}
