<?php

use Illuminate\Database\Seeder;

class CustomerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_types')->insert([
        	'customer_type' => 'Persona Natural'
        ]);
        DB::table('customer_types')->insert([
        	'customer_type' => 'Persona Juridica'
        ]);

    }
}
