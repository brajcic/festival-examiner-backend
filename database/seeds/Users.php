<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		DB::table('users')->insert([
			'name' => 'Bojan Rajcic',
			'password' => bcrypt('bojan123'),
			'email' => ' bojan@gmail.com'
		
		]);
		
		
		DB::table('users')->insert([
			'name' => 'Bojan Panic',
			'password' => bcrypt('bojan456'),
			'email' => ' panic@gmail.com'
		
		]);
		
		DB::table('users')->insert([
			'name' => 'Aleksandar Dzavric',
			'password' => bcrypt('radnaskela'),
			'email' => ' radnaskela@gmail.com'
		
		]);
        
        DB::table('users')->insert([
			'name' => 'Milica Rajcic',
			'password' => bcrypt('rajcu'),
			'email' => ' milica@gmail.com'
		
		]);
		
		DB::table('users')->insert([
			'name' => 'Marija Stojkovic',
			'password' => bcrypt('marija123'),
			'email' => ' marija@gmail.com'
		
		]);
		
		DB::table('users')->insert([
			'name' => 'Luka Stojkovic',
			'password' => bcrypt('luka06'),
			'email' => ' luka@gmail.com'
		
		]);
		
		
    }
}
