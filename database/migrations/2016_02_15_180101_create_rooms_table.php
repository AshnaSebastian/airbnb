<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->double('price');
            $table->text('aboutListing');
            $table->string('propertyType');
            $table->string('roomType');
            $table->integer('accommodates');
            $table->integer('bathrooms');
            $table->string('bedType');
            $table->integer('bedrooms');
            $table->integer('beds');
            $table->string('checkIn');
            $table->string('checkOut');
            $table->double('extraPeopleFee');
            $table->double('cleaningFee');
            $table->integer('minimumStay')->default(1);
            $table->text('description');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('rooms');
    }
}
