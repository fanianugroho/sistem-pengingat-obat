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

            'nama_interaksi' => 'Statin',
        ];
          InteraksiObat::insert($data);
    }
}
