<?php

use Illuminate\Database\Seeder;
use App\FungsiObat;

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
            'nama_fungsi' => 'Mual'
        ],
        [
            'nama_fungsi' => 'Sakit Kepala'
        ],
        [
            'nama_fungsi' => 'Meringankan demam'
        ],
        ];
        FungsiObat::insert($data);
    }
}
