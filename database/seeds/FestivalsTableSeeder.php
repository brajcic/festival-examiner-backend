<?php

use Illuminate\Database\Seeder;

class FestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('festivals')->insert([
			'festival_name' => 'Arsenal_Fest',
			'location' => 'Kragujevac, Serbia',
			'band_names' => 'Riblja_Corba, Metallica, Ghost, Nirvana',
                        'category_id' => 2,
                        'latitude' => 44.0082,
                        'longitude' => 20.913999999999987
        ]);
        
        DB::table('festivals')->insert([
			'festival_name' => 'Electronic Entertainment Expo',
			'location' => 'Los Angeles, USA',
			'band_names' => 'Microsoft, CDProjectRED, Activision, Blizzard, Sony, Nintendo',
                        'category_id' => 3,
                        'latitude' => 34.0537,
                        'longitude' => -118.243
        ]);
        
        DB::table('festivals')->insert([
			'festival_name' => 'Gitarijada',
			'location' => 'Negotin, Serbia',
			'band_names' => 'Led Zeppelin, Foo Fighters',
                        'category_id' => 2,
                        'latitude' => 44.2271,
                        'longitude' => 22.530899999999974
        ]);
        
        DB::table('festivals')->insert([
			'festival_name' => 'EXIT',
			'location' => 'Novi Sad, Serbia',
			'band_names' => 'Carl Cox, The Chainsmokers, Whitechapel, DJ SNAKE, DUBFX, BLAWAN',
                        'category_id' => 1,
                        'latitude' => 45.2551,
                        'longitude' => 19.845199999999977
        ]);
        
        DB::table('festivals')->insert([
			'festival_name' => 'Tomorrowland',
			'location' => 'Boom, Belgium',
			'band_names' => 'Martin Garrix, Dimitri Vegas, David Guetta',
                        'category_id' => 1,
                        'latitude' => 51.0874,
                        'longitude' => 4.366719999999987
        ]);
        
         DB::table('festivals')->insert([
			'festival_name' => 'Carnival',
			'location' => 'Rio de Janeiro, Brazil',
                        'category_id' => 3,
                        'latitude' => -22.911,
                        'longitude' => -43.20940000000002
			
        ]);
        
        
    }
}
