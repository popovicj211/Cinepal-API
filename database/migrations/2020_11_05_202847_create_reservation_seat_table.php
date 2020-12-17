<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_seat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('res_id');
            $table->foreign('res_id')->references('id')->on('reservation')->onDelete('cascade');
            $table->unsignedInteger('seat_id');
            $table->foreign('seat_id')->references('id')->on('seat')->onDelete('cascade');
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
        Schema::dropIfExists('reservation_seat');
    }
}
