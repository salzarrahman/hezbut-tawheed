<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            //Admin php artisan db:seed --class=SettingSeeder
            [
                'site_title' =>'Hezbu Tawheed',
                'tagline'    =>'A non-political religious reform movement',
                'logo'       =>'upload/settings/logo.png',
                'favicon'    =>'upload/settings/favicon.png',
                'address'    =>'House #03, Road #20/A, Sector #14, Uttara, Dhaka - 1230',
                'email'      =>'askhezbuttawheed@gmail.com',
                'web'        =>'www.hezbuttawheed.com',
                'phone_number'      =>'0171-1005 025, 0167-0174 643',
                'col_01'     =>'',
                'col_02'     =>'',
                'col_03'     =>'',
                'col_04'     =>'',
                'col_05'     =>'',
                'col_06'     =>'',
                'col_07'     =>'',
                'col_08'     =>'',
            ],


        ]);
    }
}
