<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
        	'city' => 'Bogota',
        	'id_country' => 1
        ]);
        DB::table('cities')->insert([
        	'city' => 'Barranquilla',
        	'id_country' => 1
        ]);
        DB::table('cities')->insert([
        	'city' => 'Medellin',
        	'id_country' => 1
        ]);
        DB::table('cities')->insert([
        	'city' => 'Cali',
        	'id_country' => 1
        ]);
        DB::table('cities')->insert([
        	'city' => 'Cartagena',
        	'id_country' => 1
        ]);

        DB::table('cities')->insert([
        	'city' => 'Miami',
        	'id_country' => 2
        ]);
        DB::table('cities')->insert([
        	'city' => 'Chicago',
        	'id_country' => 2
        ]);
        DB::table('cities')->insert([
        	'city' => 'Boston',
        	'id_country' => 2
        ]);
        DB::table('cities')->insert([
        	'city' => 'Washintong',
        	'id_country' => 2
        ]);

        DB::table('cities')->insert([
        	'city' => 'Ciudad de Mexico',
        	'id_country' => 3
        ]);
        DB::table('cities')->insert([
        	'city' => 'Lagos de Moreno',
        	'id_country' => 3
        ]);
        DB::table('cities')->insert([
        	'city' => 'Monterrey',
        	'id_country' => 3
        ]);
    }
}
