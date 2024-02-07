<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([

            [
                'menu_name'  =>'Home',
                'menu_slug'  =>'home'
            ],
            [
                'menu_name'  =>'About',
                'menu_slug'  =>'about'
            ],
            [
                'menu_name'  =>'Issues',
                'menu_slug'  =>'issues'
            ],
            [
                'menu_name'  =>'Campaign',
                'menu_slug'  =>'campaign'
            ],
            [
                'menu_name'  =>'Pages',
                'menu_slug'  =>'pages'
            ],
            [
                'menu_name'  =>'Blog',
                'menu_slug'  =>'blog'
            ],
            [
                'menu_name'  =>'Gallery',
                'menu_slug'  =>'gallery'
            ],
            [
                'menu_name'  =>'Video',
                'menu_slug'  =>'video'
            ],
            [
                'menu_name'  =>'Contact',
                'menu_slug'  =>'contact'
            ],

        ]);
    }
}
