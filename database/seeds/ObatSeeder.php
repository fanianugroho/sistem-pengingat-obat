<?php

use Illuminate\Database\Seeder;
use App\Obat;
class ObatSeeder extends Seeder
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
                'nama_obat' => 'Paracetamol Tablet ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025501',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 1,
                'id_interaksi_obat' => 1,
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Komik Sirup ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025511',
                'satuan' => 'mg',
                'id_kontraindikasi_obat' => 2,
                'id_interaksi_obat' => 2,
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Paramex Tablet ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025521',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 3,
                'id_interaksi_obat' => 3,
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Panadol Tablet',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025531',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 4,
                'id_interaksi_obat' => 4,
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Contrexyn Tablet',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025541',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 5,
                'id_interaksi_obat' => 5,
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Antimo Tablet ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025551',
                'satuan' => 'mg',
                'id_kontraindikasi_obat' => 6,
                'id_interaksi_obat' => 6,
                'petunjuk_penyimpanan' => 'jauhkan dr anak2',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],



            
        ];
          Obat::insert($data);
    }
}
