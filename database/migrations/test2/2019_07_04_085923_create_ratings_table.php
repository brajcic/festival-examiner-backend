<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
           // $table->bigInteger('festivalID');
           // $table->foreign('festivalID')->references('id')->on('festivals');
            $table->integer('rating');
            //$table->timestamps();
        });
        
        Schema::table('ratings', function (Blueprint $table){
			
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
        Schema::dropIfExists('ratings');
    }
}
