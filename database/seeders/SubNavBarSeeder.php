<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubNavBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_nav_bars')->insert([
            'name' => 'Goldbars',
            'navbar_id' => '1',
            'type'=>'product',
            'slug' => 'goldbars',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Goldcoins',
            'navbar_id' => '1',
            'type'=>'product',
            'slug' => 'goldcoins',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Goldpawn',
            'navbar_id' => '1',
            'type'=>'blog',
            'slug' => 'goldpawn',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Goldgraphic',
            'type'=>'blog',
            'navbar_id' => '1',
            'slug' => 'goldgraphic',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Silverbars',
            'type'=>'product',
            'navbar_id' => '2',
            'slug' => 'silverbars',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Silvercoins',
            'navbar_id' => '2',
            'type'=>'product',
            'slug' => 'silvercoins',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Silverpawn',
            'navbar_id' => '2',
            'type'=>'blog',
            'slug' => 'silverpawn',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Silvergraphic',
            'navbar_id' => '2',
            'type'=>'blog',
            'slug' => 'silvergraphic',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Salepolicy',
            'type'=>'blog',
            'navbar_id' => '3',
            'slug' => 'salepolicy',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Delivery',
            'type'=>'blog',
            'navbar_id' => '3',
            'slug' => 'delivery',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Payoptions',
            'type'=>'blog',
            'navbar_id' => '3',
            'slug' => 'payoptions',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'News',
            'type'=>'blog',
            'navbar_id' => '4',
            'slug' => 'news',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'Contact',
            'type'=>'blog',
            'navbar_id' => '4',
            'slug' => 'contact',
            'status' => '1']);
        DB::table('sub_nav_bars')->insert([
            'name' => 'About',
            'type'=>'blog',
            'navbar_id' => '4',
            'slug' => 'about',
            'status' => '1']);
    }
}
