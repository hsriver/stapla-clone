<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'material_id' => 1,
            'datetime' => '2020-04-01 18:00',
            'comment' => 'たくさん勉強しました！楽しかったです！',
            'study_hour' => '4',
            'study_minute' => '30',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('logs')->insert($param);
        
        $param = [
            'user_id' => 1,
            'material_id' =>2,
            'datetime' => '2020-04-02 19:10',
            'comment' => '難しい。',
            'study_hour' => '2',
            'study_minute' => '15',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('logs')->insert($param);

        $param = [
            'user_id' => 1,
            'material_id' => 3,
            'datetime' => '2020-04-02 19:14',
            'comment' => 'DB_PORT=54320にしないとpgsqlに接続できない。',
            'study_hour' => '3',
            'study_minute' => '55',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('logs')->insert($param);

        $param = [
            'user_id' => 2,
            'material_id' => 4,
            'datetime' => '2020-04-01 23:35',
            'comment' => '東大に合格します！',
            'study_hour' => '5',
            'study_minute' => '00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('logs')->insert($param);

        $param = [
            'user_id' => 2,
            'material_id' => 4,
            'datetime' => '2020-04-02 13:24',
            'comment' => '',
            'study_hour' => '1',
            'study_minute' => '00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('logs')->insert($param);

    }
}
