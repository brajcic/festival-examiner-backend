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
            $table->string('festival_name');
            $table->string('location');
            $table->string('band_names')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('image_url')->nullable();
        });
        
        
         Schema::table('festivals', function (Blueprint $table){
			
            $table->bigInteger('category_id')->unsigned()->after('id');
            $table->foreign('category_id')->references('id')->on('fcategories')->onDelete('cascade');
			
			
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
