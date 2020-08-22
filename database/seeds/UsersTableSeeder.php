<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'username' => 'Iamstudyman22',
            'name' => 'study parrot',
            'image' => '/img/parrot.png',
            'selfintro' => 'こんにちは。私は勉強が大好きです。
            主にプログラミングの勉強をしています。よろしく！',
            'email' => 'Ilovestudy@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);

        $param = [
            'username' => 'todaiikitai',
            'name' => 'たなか@東大',
            'image' => '/img/juken.png',
            'selfintro' => '高校三年生です。東大合格します！',
            'email' => 'cd ',
            'password' => bcrypt('secret'),
            'updated_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($param);
    }
}
