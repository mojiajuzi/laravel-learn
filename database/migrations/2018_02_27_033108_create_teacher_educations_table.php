<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->string("teacher_uuid");
            $table->date("start_at")->nullable()->comment("开始日期");
            $table->date("end_at")->nullable()->comment("结束日期");
            $table->string("schoole_name")->nullable()->comment("学校名称");
            $table->integer("education_type")->default(0)->comment("教育类型");
            $table->string("major")->nullable()->comment("专业");
            $table->tinyInteger("culture")->nullable()->comment("学历");
            $table->tinyInteger("degree")->nullable()->comment("学位");
            $table->string("culture_number")->nullable()->comment("学历编号");
            $table->string("degree_number")->nullable()->comment("学位编号");
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
        Schema::dropIfExists('teacher_educations');
    }
}
