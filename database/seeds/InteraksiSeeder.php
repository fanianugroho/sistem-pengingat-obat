<?php

use Illuminate\Database\Seeder;
use App\Interaksi;
class InteraksiSeeder extends Seeder
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
                'nama_interaksi' => 'Trimethoprim/sulfamethoxazole'
            ],
        ];
          Interaksi::insert($data);
    }
}
