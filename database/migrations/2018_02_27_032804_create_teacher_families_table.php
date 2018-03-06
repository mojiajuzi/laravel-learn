<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_families', function (Blueprint $table) {
            $table->increments('id');
            $table->string("teacher_uuid");
            $table->string("family_name")->comment("家庭成员名称");
            $table->string("relationship")->comment("关系");
            $table->string("work_company")->comment("工作单位");
            $table->string("work_position")->comment("工作职位");
            $table->string("work_address")->comment("工作地点");
            $table->string("mobile")->comment("联系号码");
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
        Schema::dropIfExists('teacher_families');
    }
}
