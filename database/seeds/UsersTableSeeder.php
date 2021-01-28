<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'privilege' => 1,
                'first_name' => 'Admin',
                'middle_name' => '',
                'last_name' => '',

                'email' => 'vitalicheg28@mail.ru',
                'phone' => '',
                'city' => '',
                'street' => '',
                'apartment' => '',

                'image' => '',

                'password' => Hash::make('123456789'), // шифрование пароля
            ],
            [
                'privilege' => 0,
                'first_name' => 'User',
                'middle_name' => 'User',
                'last_name' => 'Userovich',

                'email' => 'user@mail.ru',
                'phone' => '+7 (978) 536 23 85',
                'city' => 'Москва',
                'street' => 'Николоямская 12',
                'apartment' => '34',

                'image' => 'storage/users/user.jpg',

                'password' => Hash::make('zxcvbnmzx'),
            ],
        ]);
    }
}
