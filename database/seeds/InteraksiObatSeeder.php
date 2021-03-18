<?php

use Illuminate\Database\Seeder;
use App\InteraksiObat;

class InteraksiObatSeeder extends Seeder
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
                'id_interaksi' => 1,
                'id_obat' => 1,
            ],
            [
                'id_interaksi' => 2,
                'id_obat' => 1,
            ],
            [
                'id_interaksi' => 3,
                'id_obat' => 2,
            ],
            ];
            InteraksiObat::insert($data);
    }
}
