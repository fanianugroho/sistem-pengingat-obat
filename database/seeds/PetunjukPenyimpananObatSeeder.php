<?php

use Illuminate\Database\Seeder;
use App\PetunjukPenyimpananObat;

class PetunjukPenyimpananObatSeeder extends Seeder
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
                'nama_petunjuk_penyimpanan' => 'Dibawah suhu 30 derajat'
            ],
            [
                'nama_petunjuk_penyimpanan' => 'Jauhkan dari anak anak'
            ],
            [
                'nama_petunjuk_penyimpanan' => 'Simpan di kulkas'
            ],
            ];
            PetunjukPenyimpananObat::insert($data);
    }
}
