<?php

use Illuminate\Database\Seeder;
use App\BentukObat;
class BentukObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[

            'nama_bentuk' => 'Kapsul',
        ];
          BentukObat::insert($data);
    }
}
