<?php

use Illuminate\Database\Seeder;

class FungsiObatSeeder extends Seeder
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
                'id_fungsi' => 1,
                'id_obat' => 1,
            ],
            [
                'id_fungsi' => 2,
                'id_obat' => 1,
            ],
            [
                'id_fungsi' => 3,
                'id_obat' => 2,
            ],
            ];
            FungsiObat::insert($data);
    }
}
