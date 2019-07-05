<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fcategories')->insert([
			'category_name' => 'Electronic music',
	]);
        
        DB::table('fcategories')->insert([
			'category_name' => 'Rock music',
	]);
        
        DB::table('fcategories')->insert([
			'category_name' => 'Miscellaneous',
	]);
        
    }
}
