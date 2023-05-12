<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRtaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_rtask', function (Blueprint $table) {
            $table->unsignedInteger('idUse') ;
            $table->unsignedInteger('idRta') ;

            $table->primary(['idUse', 'idRta']) ;
        });

        Schema::table('users_rtask', function (Blueprint $table) 
        {
            
            $table->foreign('idUse')
                  ->references('idUse')->on('users')
                  ->onDelete('cascade') ;

            
            $table->foreign('idRta')
                  ->references('idRta')->on('rtask')
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
        Schema::dropIfExists('users_rtask');
    }
}
