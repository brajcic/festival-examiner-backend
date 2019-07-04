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
			'festivalName' => 'Arsenal_Fest',
			'location' => 'Kragujevac, Serbia',
			'bandNames' => 'Riblja_Corba, Metallica, Ghost, Nirvana'
        ]);
        
        DB::table('festivals')->insert([
			'festivalName' => 'Electronic Entertainment Expo',
			'location' => 'Los Angeles, USA',
			'bandNames' => 'Microsoft, CDProjectRED, Activision, Blizzard, Sony, Nintendo'
        ]);
        
        DB::table('festivals')->insert([
			'festivalName' => 'Gitarijada',
			'location' => 'Negotin, Serbia',
			'bandNames' => 'Led Zeppelin, Foo Fighters'
        ]);
        
        DB::table('festivals')->insert([
			'festivalName' => 'EXIT',
			'location' => 'Novi Sad, Serbia',
			'bandNames' => 'Carl Cox, The Chainsmokers, Whitechapel, DJ SNAKE, DUBFX, BLAWAN'
        ]);
        
        DB::table('festivals')->insert([
			'festivalName' => 'Tomorrowland',
			'location' => 'Boom, Belgium',
			'bandNames' => 'Martin Garrix, Dimitri Vegas, David Guetta'
        ]);
        
         DB::table('festivals')->insert([
			'festivalName' => 'Carnival',
			'location' => 'Rio de Janeiro, Brazil'
			
        ]);
        
        
    }
}
