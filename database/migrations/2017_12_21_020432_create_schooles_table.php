<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schooles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("schoole_name");
            $table->string("schoole_simple_name");
            $table->string("schoole_en_name")->defaule('');
            $table->string("schoole_code")->defaule('');
            $table->string("schoole_address");
            $table->uuid('schoole_uuid');

            //约束符
            $table->unique("schoole_name");
            $table->unique("schoole_code");

            $table->softDeletes();
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
        Schema::dropIfExists('schooles');
    }
}
