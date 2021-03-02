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
                'nama_fungsi' => 'Mual'
            ],
            [
                'nama_fungsi' => 'Sakit Kepala'
            ],
            [
                'nama_fungsi' => 'Meringankan demam'
            ],
            ];
            Fungsi::insert($data);
    }
}
