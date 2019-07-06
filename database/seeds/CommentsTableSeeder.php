<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
			'name' => '127.0.0.1',
			'festival_id' => 1,
			'comment' => ' Odlican festival, 3 dana je previse malo vremena!'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.2',
			'festival_id' => 1,
			'comment' => 'Vidimo se i sledece godine.'
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.3',
			'festival_id' => 1,
			'comment' => ' Kisa je pokvarila sve.'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.1',
			'festival_id' => 2,
			'comment' => 'Jedva sam docekao ovaj dan!'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.4',
			'festival_id' => 3,
			'comment' => ' Prava muzika, a ne ova cuda koja se slusa ovih dana.'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.5',
			'festival_id' => 3,
			'comment' => ' Ucestvovao sam na festivalu i mogu vam reci da se nikada nisam bolje proveo u zivotu.'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.6',
			'festival_id' => 4,
			'comment' => ' Bilo je okej, lokacija je samo malo daleko.'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.7',
			'festival_id' => 4,
			'comment' => ' Los provod! Ukrali su mi sator ispred nosa, spavao sam bez krova nad glavom!'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.8',
			'festival_id' => 4,
			'comment' => ' Previse narkotika za moj ukus.'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.9',
			'festival_id' => 5,
			'comment' => ' Sve pohvale za festival, jedino je cena karte mogla biti jeftinija...'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.10',
			'festival_id' => 5,
			'comment' => ' Savrsen provod za mlade osobe!'	
		]);
		
		DB::table('comments')->insert([
			'name' => '127.0.0.11',
			'festival_id' => 6,
			'comment' => ' Zasto?'	
		]);
	
    }
}
