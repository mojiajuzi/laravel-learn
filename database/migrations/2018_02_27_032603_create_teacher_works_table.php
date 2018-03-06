<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string("teacher_uuid");
            $table->date("start_at")->comment("开始日期");
            $table->date("end_at")->comment("结束日期");
            $table->string("work_company")->comment("工作单位");
            $table->string("work_position")->comment("工作职位");
            $table->string("reference")->comment("证明人");
            $table->string("reference_mobile")->comment("证明人电话号码");
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
        Schema::dropIfExists('teacher_works');
    }
}
