<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NavBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('navbars')->insert([
            'id' =>'1',
            'top'=> '1',
            'bottom' => '0',
            'name' => 'Gold',
            'slug' => 'gold',
            'status' => '1']);
        DB::table('navbars')->insert([
            'id' =>'2',
            'top'=> '1',
            'bottom' => '0',
            'name' => 'Silver',
            'slug' => 'silver',
            'status' => '1']);
        DB::table('navbars')->insert([
            'id' =>'3',
            'top'=> '1',
            'bottom' => '1',
            'name' => 'Info',
            'slug' => 'info',
            'status' => '1']);
        DB::table('navbars')->insert([
            'top'=> '1',
            'bottom' => '1',
            'id' =>'4',
            'name' => 'About',
            'slug' => 'about',
            'status' => '1']);
    }
}
