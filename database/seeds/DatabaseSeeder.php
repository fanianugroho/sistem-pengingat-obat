<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BentukObatSeeder::class);
        $this->call(InteraksiSeeder::class);
        $this->call(KontraindikasiSeeder::class);
        $this->call(FungsiSeeder::class);
        $this->call(ObatSeeder::class);
        $this->call(EfekSampingSeeder::class);
        $this->call(FungsiObatSeeder::class);
        $this->call(EfekSampingObatSeeder::class);
        $this->call(InteraksiObatSeeder::class);
        $this->call(KontraindikasiObatSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PasienSeeder::class);
        $this->call(ResepSeeder::class);
        $this->call(ObatResepSeeder::class);
        $this->call(MinumObatSeeder::class);
        $this->call(WaktuMakanSeeder::class);
        $this->call(WaktuMinumSeeder::class);
    }
}
