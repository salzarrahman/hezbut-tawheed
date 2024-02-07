<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seo_settings')->insert([
            //Admin
            [
                'meta_title'        =>'Hezbut Tawheed',
                'meta_author'       =>'Muhammad Bayazeed Khan Panni and  Hossain Mohammad Salim ',
                'meta_keyword'      =>'hezbutTawheed, Hossein, Mohammad, Selim, EmamHt, Islam, Bangladesh, Religious, organization, Humanity, Muslim, Quran, Trueislam, Muhammad, BayazeedKhan, Panni, prophet, Muhammad, Allah,  MessengerGod',
                'meta_description'  =>'HezbutTawheed is a completely nonpolitical reformist movement, the main theme of which is to unite humankind based on truth and resist the root cause of all unrest among humanity, the Dajjal, to reaffirm the global peace promised by the Almighty',
                'image'             =>'upload/seo/website.png',

            ],


        ]);
    }
}
