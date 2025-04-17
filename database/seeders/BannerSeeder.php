<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            'image'=>'upload/carousel/madia_1742374594_35_23.png',
            'name' => 'Sunshine1',
            'content'=> 'lorem ipsum',
            'button_url' => '#home',
            'button_url_text'=>'Home1',
            'status' => '1',
        ]);
        DB::table('banners')->insert([
            'image'=>'upload/carousel/madia_1742374594_35_23.png',
            'name' => 'Sunshine2',
            'content'=> 'lorem ipsum',
            'button_url' => '#home',
            'button_url_text'=>'Home2',
            'status' => '1',
        ]);


    }
}
