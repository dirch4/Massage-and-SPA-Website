<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [[
            'name'=> 'Mas Dimas',
            'email'=>'dimas@gmail.com',
            'no_telp'=>'08123456719',
            'alamat'=>'Jl. Raya No. 123',
            'role'=>'user',
            'password'=>bcrypt('123')
        ],[
            'name'=> 'Admin',
            'email'=>'admin@gmail.com',
            'no_telp'=>'08123456729',
            'alamat'=>'Jl. Raya No. 123',
            'role'=>'admin',
            'password'=>bcrypt('123')
        ],[
            'name'=> 'Mas Axel',
            'email'=>'axel@gmail.com',
            'no_telp'=>'08123456739',
            'alamat'=>'Jl. Raya No. 123',
            'role'=>'karyawan',
            'password'=>bcrypt('123')
        ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
