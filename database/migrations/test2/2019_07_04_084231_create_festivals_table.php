<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->bigIncrements('id');
          //$table->integer('festivalID');
            $table->string('festivalName');
            $table->string('location');
            $table->string('bandNames')->nullable();
            //$table->timestamps();
        });
        
        
         Schema::table('festivals', function (Blueprint $table){
			
            $table->bigInteger('categoryID')->unsigned()->after('id');
            $table->foreign('categoryID')->references('id')->on('fcategories');
			
			
	});
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festivals');
    }
}
