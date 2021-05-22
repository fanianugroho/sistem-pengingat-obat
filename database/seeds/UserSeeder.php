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
            'password' => bcrypt('admin123'),
        ],
        [
            'nama' => 'apoteker',
            'username'=>'apoteker',
            'tipe_user' => 'apoteker',
            'email' => 'apoteker@apoteker.com',
            'password' => bcrypt('apoteker123'),
        ]
        ];
        User::insert($data);
    }
}
