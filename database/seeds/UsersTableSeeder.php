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
                'email' => 'vitalicheg28@mail.ru',
                'password' => Hash::make('123456789'), // шифрование пароля
            ],
            [
                'privilege' => 0,
                'first_name' => 'user',
                'email' => 'user@mail.ru',
                'password' => Hash::make('zxcvbnmzx'),
            ],
        ]);
    }
}
