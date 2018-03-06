<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_emergencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string("teacher_uuid");
            $table->string("emergency_name")->comment("紧急联系人名称");
            $table->string("emergency_mobile")->comment("紧急联系人电话");
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
        Schema::dropIfExists('teacher_emergencies');
    }
}
