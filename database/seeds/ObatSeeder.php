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
                'kesediaan' => '10',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 1,
                'id_interaksi_obat' => 1,
                'id_efek_samping_obat' => 1,
                'id_petunjuk_penyimpanan_obat' => 1,
                'id_fungsi_obat' => 1,
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Komik Sirup ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025511',
                'kesediaan' => '10',
                'satuan' => 'mg',
                'id_kontraindikasi_obat' => 2,
                'id_interaksi_obat' => 2,
                'id_efek_samping_obat' => 2,
                'id_petunjuk_penyimpanan_obat' => 2,
                'id_fungsi_obat' => 2,
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Paramex Tablet ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025521',
                'kesediaan' => '20',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 3,
                'id_interaksi_obat' => 3,
                'id_efek_samping_obat' => 3,
                'id_petunjuk_penyimpanan_obat' => 1,
                'id_fungsi_obat' => 3,
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Panadol Tablet',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025531',
                'kesediaan' => ' 10',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 4,
                'id_interaksi_obat' => 4,
                'id_efek_samping_obat' => 1,
                'id_petunjuk_penyimpanan_obat' => 1,
                'id_fungsi_obat' => 3,
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Contrexyn Tablet',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025541',
                'kesediaan' => '20',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 5,
                'id_interaksi_obat' => 5,
                'id_efek_samping_obat' => 1,
                'id_petunjuk_penyimpanan_obat' => 2,
                'id_fungsi_obat' => 3,
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Antimo Tablet ',
                'id_bentuk_obat' => 1,
                'kode_obat' => 'OB0025551',
                'kesediaan' => '10',
                'satuan' => 'mg',
                'id_kontraindikasi_obat' => 6,
                'id_interaksi_obat' => 6,
                'id_efek_samping_obat' => 1,
                'id_petunjuk_penyimpanan_obat' => 2,
                'id_fungsi_obat' => 1,
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],



            
        ];
          Obat::insert($data);
    }
}
