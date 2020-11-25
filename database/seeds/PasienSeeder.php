<?php

use Illuminate\Database\Seeder;
use App\Pasien;

class PasienSeeder extends Seeder
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
                'no_rm' => '9',
                'nama_pasien' => 'Aprillia Renanda',
                'tanggal_lahir' => '2005-08-07',
                'jenis_kelamin' => 'Laki-laki',
                'no_telp' => '083145477841',
                'alamat' => 'Jakarta',
            ],
        ];
        Pasien::insert($data);
    }
}
