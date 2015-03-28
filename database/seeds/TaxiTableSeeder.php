<?php

use Illuminate\Database\Seeder;
use App\Taxi;

class TaxiTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

        DB::table('taxis')->delete();
        for($i = 0;$i<10;$i++)
        {

            Taxi::create([
                'phone' => '1822293681'.$i,
                'username' => 'bal_'.$i,
                'license' => 'ACD_'.$i,
                ]);
        }
	}

}
