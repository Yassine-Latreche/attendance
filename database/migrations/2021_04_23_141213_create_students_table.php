<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('level_Id');       
            $table->foreignId('section_Id');       
            $table->foreignId('group_Id');       
            $table->string('email')->unique();
            $table->string('national_Student_Id')->unique();
            $table->date('birthday');
            $table->integer('phone_number')->unique();
            $table->string('living_area');
            $table->string('willaya_d_origine');
            $table->integer('initialized')->default('0');
            $table->string('device_type')->nullable();
            $table->string('device_id')->nullable()->unique();
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
        Schema::dropIfExists('students');
    }
}
