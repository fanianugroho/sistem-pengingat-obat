<?php

use Illuminate\Database\Seeder;

class EfekSampingObatSeeder extends Seeder
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
                'id_efek_samping' => 1,
                'id_obat' => 1,
            ],
            [
                'id_efek_samping' => 2,
                'id_obat' => 1,
            ],
            [
                'id_efek_samping' => 3,
                'id_obat' => 2,
            ],
            ];
            FungsiObat::insert($data);
    }
}
