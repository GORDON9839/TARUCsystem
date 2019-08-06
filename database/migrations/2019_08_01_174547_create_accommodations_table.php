<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->bigIncrements('accommodation_id');
            $table->string('accommodation_name');
            $table->string('accommodation_address');
            $table->double('fees');
            $table->integer('total_room');
            $table->integer('rent_number');
            $table->string('accommodation_type');
            $table->unsignedBigInteger('campus_id');
            $table->foreign('campus_id')->references('campus_id')->on('campuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accommodations');
    }
}
