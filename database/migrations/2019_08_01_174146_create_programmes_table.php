<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->bigIncrements('programme_id');
            $table->string('programme_name');
            $table->string('programme_code')->unique();
            $table->string('programme_desc');
            $table->Integer('fulltime_duration');
            $table->Integer('parttime_duration');
            $table->unsignedBigInteger('level_of_study_id');
            $table->unsignedBigInteger('faculty_id');
            $table->string('professional_certification');
            $table->string('MER_SPM');
            $table->string('MER_STPM');
            $table->string('MER_UEC');
            $table->string('MER_desc');
            $table->string ('fee_local');
            $table->string('fee_international');
            $table->string('curriculum_id')->nullable();
            $table->foreign('curriculum_id')->references('curriculum_id')->on('curriculum');
            $table->foreign('level_of_study_id')->references('level_of_study_id')->on('level_of_studies');
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programmes');
    }
}
