<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users'); //ユーザーテーブルのid参照
            $table->integer('material_id')->references('id')->on('materials'); //教材テーブルのid参照
            $table->dateTime('datetime');
            $table->string('comment', 100)->nullable(); //100文字まで
            $table->string('study_hour', 5)->default('0');
            $table->string('study_minute', 5)->default('00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
