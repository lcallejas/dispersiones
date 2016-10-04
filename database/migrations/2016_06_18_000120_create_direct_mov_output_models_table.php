<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectMovOutputModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directmov_output', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('directmov_output_no')->unsigned();
            $table->string('directmov_output_company');
            $table->string('directmov_output_type');
            $table->float('directmov_output_rode');
            $table->string('directmov_output_disperser');
            $table->string('directmov_output_origin');
            $table->string('directmov_output_destiny');
            $table->string('directmov_output_comment',1000);
            $table->timestamps();

            $table->foreign('directmov_output_no')->references('id')->on('directmov');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('directmov_output');
    }
}
