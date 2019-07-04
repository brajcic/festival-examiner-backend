<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert([
			'name' => '127.0.0.1',
			'festivalID' => 1,
			'rating' => 5
		]);
		
		 DB::table('ratings')->insert([
			'name' => '126.0.0.5',
			'festivalID' => 1,
			'rating' => 5
		]);
		
		 DB::table('ratings')->insert([
			'name' => '123.123.123.123',
			'festivalID' => 1,
			'rating' => 5
		]);
		
		
		 DB::table('ratings')->insert([
			'name' => '127.0.0.1',
			'festivalID' => 2,
			'rating' => 4
		]);
		
		 DB::table('ratings')->insert([
			'name' => '127.5.1.2',
			'festivalID' => 3,
			'rating' => 2
		]);
		
		 DB::table('ratings')->insert([
			'name' => '127.0.0.15',
			'festivalID' => 6,
			'rating' => 4
		]);
		
		 DB::table('ratings')->insert([
			'name' => '122.15.0.1',
			'festivalID' => 4,
			'rating' => 1
		]);
		
		
		 DB::table('ratings')->insert([
			'name' => '127.0.0.6',
			'festivalID' => 4,
			'rating' => 5
		]);
		
		 DB::table('ratings')->insert([
			'name' => '127.0.0.0',
			'festivalID' => 3,
			'rating' => 1
		]);
		
		
    }
}
