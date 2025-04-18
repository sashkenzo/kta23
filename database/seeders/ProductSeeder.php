<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'goldcoin1',
            'slug' => 'goldcoin1',
            'user_id' => '1',
            'short_description' => 'a bar of gold1',
            'description' => 'a bar of gold',
            'subcategory_id' => '1',
            'price' => '9999',
            'status'=> '1',
        ]);
        DB::table('products')->insert([
            'name' => 'goldcoin2',
            'slug' => 'goldcoin2',
            'user_id' => '2',
            'short_description' => 'a bar of gold2',
            'description' => 'a bar of gold',
            'subcategory_id' => '1',
            'price' => '9999',
            'status'=> '1',
        ]);
    }
}
