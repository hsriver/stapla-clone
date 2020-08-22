<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category_id' => 1,
            'material_name' => 'TOEFL対策',
            'image' => '/img/toefl.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('materials')->insert($param);

        $param = [
            'category_id' => 1,
            'material_name' => 'EDM英会話',
            'image' => '/img/eikaiwa.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('materials')->insert($param);

        $param = [
            'category_id' => 2,
            'material_name' => 'Laravel',
            'image' => '/img/laravel.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('materials')->insert($param);

        $param = [
            'category_id' => 3,
            'material_name' => '文系数弱の悪問プラチナ',
            'image' => '/img/platinum.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('materials')->insert($param);
    }
}
