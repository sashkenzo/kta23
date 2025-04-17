<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Banner2CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banner2_carousels')->insert([
                'image'=>'upload/carousel/madia_1742374594_35_23.png',
                'name' => 'Sunshine',
                'button_url' => 'http://localhost/kta23v_app/public/',
                'serial' =>'1',
                'status' => '1']);
        DB::table('banner2_carousels')->insert([
                'image'=>'upload/carousel/madia_1742374661_90_22.jpg',
                'name' => 'Sunheart',
                'button_url' => 'http://localhost/kta23v_app/public/',
                'serial' =>'2',
                'status' => '1'
            ]);

    }
}
