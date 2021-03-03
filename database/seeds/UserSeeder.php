<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'nama' => 'admin',
            'username'=>'admin',
            'tipe_user' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at'=>'2020-08-01 01:00:00',
            'password' => bcrypt('admin123'),
        ],
        [
            'nama' => 'apoteker',
            'username'=>'apoteker',
            'tipe_user' => 'apoteker',
            'email' => 'apoteker@apoteker.com',
            'email_verified_at'=>'2020-08-01 01:00:00',
            'password' => bcrypt('apoteker123'),
        ]
        ];
        User::insert($data);
    }
}
