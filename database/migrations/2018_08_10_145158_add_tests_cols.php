<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestsCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->unsignedTinyInteger('grade');
            $table->unsignedTinyInteger('class');
            $table->unsignedTinyInteger('num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn(['grade', 'class', 'num']);
        });
    }
}
