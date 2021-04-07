<?php

use Illuminate\Database\Seeder;
use App\EfekSamping;

class EfekSampingSeeder extends Seeder
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
                'nama_efek_samping' => 'Mual'
            ],
            [
                'nama_efek_samping' => 'Diare'
            ],
            [
                'nama_efek_samping' => 'Menyebabkan kantuk'
            ],
            ];
            EfekSamping::insert($data);
    }
}
