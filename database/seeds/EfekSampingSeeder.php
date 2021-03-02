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
                'nama_efek_samping' => 'Sakit Kepala'
            ],
            [
                'nama_efek_samping' => 'Meringankan demam'
            ],
            ];
            EfekSamping::insert($data);
    }
}
