<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('footer_logos')->insert([
            'image'=>'upload/logo/media_1742931101_33_64.webp',
            'name' => 'Gold',
            'status' => '1',
            'homelink' => 'op.awebcode.ee']);
    }
}
