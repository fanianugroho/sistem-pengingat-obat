<?php

use Illuminate\Database\Seeder;
use App\WaktuMakan;

class WaktuMakanSeeder extends Seeder
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
                'id_minum_obat' => 1,
                'jam_makan' => 'pagi',
                'waktu' => '06:30',
                'keterangan' => 'makan pagi'
            ],
            [
                'id_minum_obat' => 1,
                'jam_makan' => 'siang',
                'waktu' => '14:30',
                'keterangan' => 'makan siang'
            ],
            [
                'id_minum_obat' => 1,
                'jam_makan' => 'malam',
                'waktu' => '22:30',
                'keterangan' => 'makan malam'
            ],
            [
                'id_minum_obat' => 2,
                'jam_makan' => 'pagi',
                'waktu' => '06:30',
                'keterangan' => 'makan pagi'
            ],
            [
                'id_minum_obat' => 2,
                'jam_makan' => 'siang',
                'waktu' => '14:30',
                'keterangan' => 'makan siang'
            ],
            [
                'id_minum_obat' => 2,
                'jam_makan' => 'malam',
                'waktu' => '22:30',
                'keterangan' => 'makan malam'
            ]
            
        ];
        WaktuMakan::insert($data);
    }
}
