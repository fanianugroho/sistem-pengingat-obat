<?php

use Illuminate\Database\Seeder;
use App\WaktuMinum;

class WaktuMinumSeeder extends Seeder
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
                'jam_minum' => 'pagi',
                'waktu' => '07:00',
            ],
            [
                'id_minum_obat' => 1,
                'jam_minum' => 'siang',
                'waktu' => '15:00',
            ],
            [
                'id_minum_obat' => 1,
                'jam_minum' => 'malam',
                'waktu' => '23:00',
            ],
            [
                'id_minum_obat' => 2,
                'jam_minum' => 'pagi',
                'waktu' => '07:00',
            ],
            [
                'id_minum_obat' => 2,
                'jam_minum' => 'siang',
                'waktu' => '15:00',
            ],
            [
                'id_minum_obat' => 2,
                'jam_minum' => 'malam',
                'waktu' => '23:00',
            ]
            
        ];

        WaktuMinum::insert($data);
    }
}
