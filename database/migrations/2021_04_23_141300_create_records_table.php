<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_Id');
            $table->foreignId('lecture_Id');  
            $table->foreignId('generated_qr_code_Id');  
            $table->string('device_type');
            $table->string('device_id');     
            $table->string('qr_code_string');
            $table->time('scanning_time')->nullable();
            $table->time('sending_time')->nullable();
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
        Schema::dropIfExists('records');
    }
}
