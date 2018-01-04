<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomefileToTeacherDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_details', function (Blueprint $table) {
            $table->integer("teacher_sex")->default(0);
            $table->string("teacher_mobile");
            $table->date("Y-m-d")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_details', function (Blueprint $table) {
            //
        });
    }
}
