<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTeacherFamilyWorkNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_families', function (Blueprint $table) {
            $table->string("work_company")->nullable()->change();
            $table->string("work_position")->nullable()->change();
            $table->string("work_address")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_families', function (Blueprint $table) {
            //
        });
    }
}
