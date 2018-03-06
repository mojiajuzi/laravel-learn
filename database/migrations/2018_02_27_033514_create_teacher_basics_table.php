<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_basics', function (Blueprint $table) {
            $table->increments('id');
            $table->string("teacher_uuid");
            $table->string("schoole_uuid");
            $table->string("mobile")->comment("手机")->nullable();
            $table->string("email")->comment("邮箱")->nullable();
            $table->string("teacher_name")->comment("教师姓名");
            $table->string("gender")->comment("性别")->nullable();
            $table->string("nation")->comment("民族")->nullable();
            $table->string("native_place")->comment("籍贯")->nullable();
            $table->string("id_type")->comment("证件类型")->nullable();
            $table->string("id_card")->comment("身份证")->nullable();
            $table->tinyInteger("martial")->comment("婚姻状态")->nullable();
            $table->tinyInteger("political")->comment("政治面貌")->nullable();
            $table->date("birthday")->comment("生日")->nullable();
            $table->text("permanent_address")->comment("户籍")->nullable();
            $table->tinyInteger("permananent_address_type")->comment("户籍类型")->nullable();
            $table->text("registered_redidence")->comment("户籍所在地")->nullable();
            $table->text("local_address")->comment("通讯地址")->nullable();
            $table->tinyInteger("culture_type")->comment("文化程度")->nullable();
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
        Schema::dropIfExists('teacher_basics');
    }
}
