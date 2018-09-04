<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
        	'id' => 1,
        	'country' => 'Colombia'
        ]);
        DB::table('countries')->insert([
        	'id' => 2,
        	'country' => 'Estados Unidos'
        ]);
        DB::table('countries')->insert([
        	'id' => 3,
        	'country' => 'Mexico'
        ]);
    }
}
