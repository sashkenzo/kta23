<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cards')->insert([
            'image'=>'upload/cards/media_1742898460_42_54.webp',
            'name' => 'gold1',
            'content'=>'goldcoin is shining',
            'button_url' => 'http://localhost/kta23v_app/public/',
            'status' => '1']);
        DB::table('cards')->insert([
            'image'=>'upload/cards/media_1742898460_42_54.webp',
            'name' => 'gold2',
            'content'=>'goldcoin is shining',
            'button_url' => 'http://localhost/kta23v_app/public/',
            'status' => '1']);
        DB::table('cards')->insert([
            'image'=>'upload/cards/media_1742898460_42_54.webp',
            'name' => 'gold3',
            'content'=>'goldcoin is shining',
            'button_url' => 'http://localhost/kta23v_app/public/',
            'status' => '1']);
        DB::table('cards')->insert([
            'image'=>'upload/cards/media_1742898460_42_54.webp',
            'name' => 'gold4',
            'content'=>'goldcoin is shining',
            'button_url' => 'http://localhost/kta23v_app/public/',
            'status' => '1']);
        DB::table('cards')->insert([
            'image'=>'upload/cards/media_1742898460_42_54.webp',
            'name' => 'gold5',
            'content'=>'goldcoin is shining',
            'button_url' => 'http://localhost/kta23v_app/public/',
            'status' => '1']);
    }
}
