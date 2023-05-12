<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->increments("idTas");
            $table->unsignedInteger("idUse") ;
            $table->string("title", 100);
            $table->string("description", 255);
            $table->date("date");
            $table->boolean("saved")->default(false) ;
            $table->string("status", 50);
        });

        // define the foreign key
        Schema::table('task', function (Blueprint $table) 
        {
            $table->foreign('idUse')
                  ->references('idUse')
                  ->on('users')                  
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
        Schema::dropIfExists('task');
    }
}
