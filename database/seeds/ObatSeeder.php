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
                'kesediaan' => '10 mg',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 1,
                'id_interaksi_obat' => 1,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Komik Sirup ',
                'id_bentuk_obat' => 1,
                'kesediaan' => '10 ml',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 2,
                'id_interaksi_obat' => 2,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Paramex Tablet ',
                'id_bentuk_obat' => 1,
                'kesediaan' => '20 mg',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 3,
                'id_interaksi_obat' => 3,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Panadol Tablet',
                'id_bentuk_obat' => 1,
                'kesediaan' => ' 10 ml',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 4,
                'id_interaksi_obat' => 4,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Contrexyn Tablet',
                'id_bentuk_obat' => 1,
                'kesediaan' => '20 ml',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 5,
                'id_interaksi_obat' => 5,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],
            [
                'nama_obat' => 'Antimo Tablet ',
                'id_bentuk_obat' => 1,
                'kesediaan' => '10 ml',
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 6,
                'id_interaksi_obat' => 6,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',

            ],



            
        ];
          Obat::insert($data);
    }
}
