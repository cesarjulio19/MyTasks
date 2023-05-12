<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rtask', function (Blueprint $table) {
            $table->increments("idRta");
            $table->unsignedInteger("idTta") ;
            $table->string("title", 50);
            $table->string("description", 255);
        });

        // define the foreign key
        Schema::table('rtask', function (Blueprint $table) 
        {
            $table->foreign('idTta')
                  ->references('idTta')
                  ->on('ttask')                  
                  ->onDelete('cascade') ;
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rtask');
    }
}
