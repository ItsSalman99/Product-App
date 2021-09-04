<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Salman Abbas',
            'email' => 'salmanabbas@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' =>  1,
        ]);
        
        User::create([
            'name' => 'Lorem Ipsom',
            'email' => 'loremipsum@gmail.com',
            'password' => Hash::make('123456789'),
            'is_admin' =>  0,
        ]);
    }
}
