<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_Id');       
            $table->foreignId('professor_Id');       
            $table->foreignId('level_Id');       
            $table->boolean('is_In_Group');
            $table->foreignId('group_Id')->nullable();
            $table->boolean('is_In_Section');
            $table->foreignId('section_Id')->nullable();
            $table->string('lecture_Type'); 
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
        Schema::dropIfExists('time_tables');
    }
}
