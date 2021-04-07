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
                    'id_kontraindikasi' => 1,
                    'id_obat' => 1,
                ],
                [
                    'id_kontraindikasi' => 2,
                    'id_obat' => 3,
                ],
                [
                    'id_kontraindikasi' => 3,
                    'id_obat' => 2,
                ],
            ];
            KontraindikasiObat::insert($data);
    }
}
