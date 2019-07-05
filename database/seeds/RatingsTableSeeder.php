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
			'festival_id' => 1,
			'rating' => 5
		]);
		
		 DB::table('ratings')->insert([
			'name' => '126.0.0.5',
			'festival_id' => 1,
			'rating' => 5
		]);
		
		 DB::table('ratings')->insert([
			'name' => '123.123.123.123',
			'festival_id' => 1,
			'rating' => 5
		]);
		
		
		 DB::table('ratings')->insert([
			'name' => '127.0.0.1',
			'festival_id' => 2,
			'rating' => 4
		]);
		
		 DB::table('ratings')->insert([
			'name' => '127.5.1.2',
			'festival_id' => 3,
			'rating' => 2
		]);
		
		 DB::table('ratings')->insert([
			'name' => '127.0.0.15',
			'festival_id' => 6,
			'rating' => 4
		]);
		
		 DB::table('ratings')->insert([
			'name' => '122.15.0.1',
			'festival_id' => 4,
			'rating' => 1
		]);
		
		
		 DB::table('ratings')->insert([
			'name' => '127.0.0.6',
			'festival_id' => 4,
			'rating' => 5
		]);
		
		 DB::table('ratings')->insert([
			'name' => '127.0.0.0',
			'festival_id' => 3,
			'rating' => 1
		]);
		
		
    }
}
