<?php

use Illuminate\Database\Seeder;
use App\Fungsi;

class FungsiSeeder extends Seeder
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
                'nama_fungsi' => 'Meringankan sakit kepala'
            ],
            [
                'nama_fungsi' => 'Meredakan asam urat'
            ],
            [
                'nama_fungsi' => 'Meringankan demam'
            ],
            ];
            Fungsi::insert($data);
    }
}
