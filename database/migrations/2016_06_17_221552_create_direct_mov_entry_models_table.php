<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectMovEntryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directmov_entry', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('directmov_no')->unsigned();
            $table->integer('directmov_company')->unsigned();
            $table->float('directmov_rode');
            $table->string('directmov_bank');
            $table->string('directmov_account');
            $table->timestamps();

            $table->foreign('directmov_no')->references('id')->on('directmov');
            $table->foreign('directmov_company')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('directmov_entry');
    }
}
