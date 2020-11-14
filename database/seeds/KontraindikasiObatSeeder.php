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

            'nama_kontraindikasi' => 'Ibu Hamil',
        ];
          KontraindikasiObat::insert($data);
    }
}
