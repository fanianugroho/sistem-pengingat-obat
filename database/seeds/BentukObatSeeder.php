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
            [
                'nama_bentuk' => 'Cair'
            ],
            [
                'nama_bentuk' => 'Kaplet'
            ],
            [
                'nama_bentuk' => 'Serbuk'
            ],
            [
                'nama_bentuk' => 'Tetes'
            ],
            [
                'nama_bentuk' => 'Tablet'
            ],
            [
                'nama_bentuk' => 'Sirup'
            ],

            
        ];
          BentukObat::insert($data);
    }
}
