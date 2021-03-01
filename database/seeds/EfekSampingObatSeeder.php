<?php

use Illuminate\Database\Seeder;
use App\EfekSampingObat;

class EfekSampingObatSeeder extends Seeder
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
            EfekSampingObat::insert($data);
    }
}
