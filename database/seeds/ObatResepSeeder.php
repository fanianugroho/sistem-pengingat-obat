<?php

use Illuminate\Database\Seeder;
use App\ObatResep;
class ObatResepSeeder extends Seeder
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
                'id' => 1,
                'id_obat' => 1,
                'id_resep' => 1,
                'dosis' => 3,
                'aturan_pakai' => 12,
                'takaran_minum' => 0.6,
                'waktu_minum' => 'Sebelum Makan',
                'keterangan' => 'Kondisional',
                'jml_obat' => 12,
                'jml_kali_minum' =>20
            ],
            [
                'id' => 2,
                'id_obat' => 2,
                'id_resep' => 1,
                'dosis' => 3,
                'aturan_pakai' => 12,
                'takaran_minum' => 0.5,
                'waktu_minum' => 'Sebelum Makan',
                'keterangan' => 'Kondisional',
                'jml_obat' => 3,
                'jml_kali_minum' =>0.3
            ],
        ];
        ObatResep::insert($data);
    }
}
