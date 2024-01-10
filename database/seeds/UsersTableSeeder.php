<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Data yang ingin Anda tambahkan ke tabel users
        $usersData = [
            [
                'name' => 'Ihsan Ramadhan',
                'email' => 'ihsan.ramadhan@pt.bas.id.com',
                'password' => Hash::make('ptbas123'),
            ],
            [
                'name' => 'Nurdiansyah Joyo',
                'email' => 'nurdiansyahjoyo@gmail.com',
                'password' => Hash::make('ptbas123'),
            ],
            [
                'name' => 'Admin Boiler',
                'email' => 'adminboiler@gmail.com',
                'password' => Hash::make('ptbas123'),
            ],
        ];

        // Menyisipkan data ke dalam tabel users
        foreach ($usersData as $userData) {
            DB::table('users')->insert($userData);
        }
    }
}
