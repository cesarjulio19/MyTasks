<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stask', function (Blueprint $table) {
            $table->increments("idSta");
            $table->unsignedInteger("idUse") ;
            $table->integer('idTas')->unsigned()->nullable();
            $table->string("title", 50);
            $table->string("description", 255);
        });

        // define the foreign key
        Schema::table('stask', function (Blueprint $table) 
        {
            $table->foreign('idUse')
                  ->references('idUse')
                  ->on('users')                  
                  ->onDelete('cascade') ;



             $table->foreign('idTas')
                  ->references('idTas')
                  ->on('task')                  
                  ->onDelete('set null');



        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stask');
    }
}
