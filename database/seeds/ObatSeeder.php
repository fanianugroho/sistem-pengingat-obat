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
                'nama_obat' => 'Paracetamol Tablet 10 mg',
                'id_bentuk_obat' => 1,
                'kesediaan' => 3,
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 1,
                'id_interaksi_obat' => 1,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',
                'harga_pokok' => 30000,
                'harga_jual' => 35000,
                'stok' => 10,
                'min_stok' => 5,

            ],
            [
                'nama_obat' => 'Komik Sirup 10 ml',
                'id_bentuk_obat' => 1,
                'kesediaan' => 3,
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 2,
                'id_interaksi_obat' => 2,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',
                'harga_pokok' => 30000,
                'harga_jual' => 35000,
                'stok' => 10,
                'min_stok' => 5,

            ],
            [
                'nama_obat' => 'Paramex Tablet 20 mg',
                'id_bentuk_obat' => 1,
                'kesediaan' => 3,
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 3,
                'id_interaksi_obat' => 3,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',
                'harga_pokok' => 30000,
                'harga_jual' => 35000,
                'stok' => 10,
                'min_stok' => 5,

            ],
            [
                'nama_obat' => 'Panadol Tablet 10 ml',
                'id_bentuk_obat' => 1,
                'kesediaan' => 3,
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 4,
                'id_interaksi_obat' => 4,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',
                'harga_pokok' => 30000,
                'harga_jual' => 35000,
                'stok' => 10,
                'min_stok' => 5,

            ],
            [
                'nama_obat' => 'Contrexyn Tablet 20 ml	',
                'id_bentuk_obat' => 1,
                'kesediaan' => 3,
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 5,
                'id_interaksi_obat' => 5,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',
                'harga_pokok' => 30000,
                'harga_jual' => 35000,
                'stok' => 10,
                'min_stok' => 5,

            ],
            [
                'nama_obat' => 'Antimo Tablet 10 ml',
                'id_bentuk_obat' => 1,
                'kesediaan' => 3,
                'satuan' => 'ml',
                'id_kontraindikasi_obat' => 6,
                'id_interaksi_obat' => 6,
                'efek_samping' => 'Kantuk,Mual',
                'petunjuk_penyimpanan' => 'Simpan dibawah suhu 30 derajat celcius',
                'pola_makan' => '3x sehari',
                'informasi' => '-',
                'harga_pokok' => 30000,
                'harga_jual' => 35000,
                'stok' => 10,
                'min_stok' => 5,

            ],



            
        ];
          Obat::insert($data);
    }
}
