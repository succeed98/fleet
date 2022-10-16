<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaleFueling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fueling', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('truck_id')->unsigned();
            $table->integer('company_id')->unsigned();

            $table->string('fuel');
            $table->string('cost');
            $table->text('note');
            
            $table->timestamps();

            $table->foreign('truck_id')->references('id')->on('trucks');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fueling');
    }
}
