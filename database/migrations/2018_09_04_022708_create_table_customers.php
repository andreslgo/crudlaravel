<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nit')->unique();
            $table->string('name', 50);
            $table->integer('id_customer_type')->unsigned();
            $table->string('address', 50);
            $table->integer('id_country')->unsigned();
            $table->integer('id_city')->unsigned();
            $table->string('phone', 30);
            $table->string('email', 50);
            $table->timestamps();
            $table->index('id_customer_type');
            $table->index('id_country');
            $table->index('id_city');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
