<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' =>  'Zainal Abrori',
                'email' => 'abrorizainal263@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],

            //user
            [
                'name' =>  'Baitur Rohman',
                'email' => 'baitur@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'user',
            ]
        ]);
    }
}
