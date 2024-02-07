<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name'      =>'Admin',
                'username'  =>'Admin',
                'email'     =>'admin@hezbuttawheed.com',
                'password'  => Hash::make('IT@@2255##$'),
                'role'      =>'admin',
                'status'      =>'active',
            ],

             //User
            [
                'name'      =>'User',
                'username'  =>'User',
                'email'     =>'user@hezbuttawheed.com',
                'password'  => Hash::make('IT@@2255##$'),
                'role'      =>'user',
                'status'      =>'active',
            ]

        ]);
    }
}
