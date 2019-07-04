<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->timestamps();
            $table->string('name');
            //$table->bigInteger('festivalID');
			//$table->foreign('festivalID')->references('id')->on('festivals');
            $table->string('comment');

            
        });
        
        
        Schema::table('comments', function (Blueprint $table){
			
			  $table->bigInteger('festivalID')->unsigned()->after('name');
			  $table->foreign('festivalID')->references('id')->on('festivals');
			
			
		});
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
