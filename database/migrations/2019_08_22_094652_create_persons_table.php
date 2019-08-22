<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('first_name');
	        $table->string('last_name');
	        $table->string('title');
	        $table->string('company');
	        $table->string('phone');
	        $table->string('email');
	        $table->string('address');
	        $table->string('address_2');
	        $table->string('city');
	        $table->string('state');
	        $table->string('zip_code');
	        $table->string('photo');
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
