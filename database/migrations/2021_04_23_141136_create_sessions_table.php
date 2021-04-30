<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professor_Id');       
            $table->boolean('is_in_group');
            $table->foreignId('group_Id')->nullable();
            $table->boolean('is_in_section');
            $table->foreignId('section_Id')->nullable();
            $table->char('session_type'); 
            $table->date('date');
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
        Schema::dropIfExists('sessions');
    }
}
