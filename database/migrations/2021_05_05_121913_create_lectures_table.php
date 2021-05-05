<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();      
            $table->foreignId('professor_Id');       
            $table->boolean('is_In_Group');
            $table->foreignId('group_Id');
            $table->boolean('is_In_Section');
            $table->foreignId('section_Id');
            $table->char('lecture_Type'); 
            $table->string('day_Of_Week');
            $table->time('starting');
            $table->time('ending');
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
        Schema::dropIfExists('lectures');
    }
}
