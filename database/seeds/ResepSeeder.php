<?php

use Illuminate\Database\Seeder;
use App\Resep;
class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
                'id' => 1,
                'id_pasien' => 1,
                'id_users' => 1,
                'created_at' => '2021-04-06 12:03:04'
            
            ];
      Resep::insert($data);
}
    
}
