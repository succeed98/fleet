<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTanle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('truck_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('site_id')->unsigned();

            $table->string('uid');
            $table->string('weight')->nullable();
            $table->string('cost')->nullable();
            $table->text('description')->nullable();
            $table->boolean('processed')->default(false);
            $table->longText('documentation')->nullable();
            $table->enum('status', ['complete', 'pending', 'cancelled']);
            $table->integer('processed_percentage')->nullable();

            $table->timestamp('departed_at')->nullable();
            $table->timestamp('arrived_at')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('truck_id')->references('id')->on('trucks');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('site_id')->references('id')->on('sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
