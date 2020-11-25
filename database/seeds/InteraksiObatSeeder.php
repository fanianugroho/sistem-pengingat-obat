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
                'nama_interaksi' => 'Statin'
            ],
            [
                'nama_interaksi' => 'Diltiazem'
            ],
            [
                'nama_interaksi' => 'Amiodarone'
            ],
            [
                'nama_interaksi' => 'Nevirapine'
            ],
            [
                'nama_interaksi' => 'Levofloxacin'
            ],
            [
                'nama_interaksi' => '	Trimethoprim/sulfamethoxazole'
            ],
            

            
        ];
          InteraksiObat::insert($data);
    }
}
