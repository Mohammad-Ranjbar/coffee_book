<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function (Blueprint $table) {
			$table->Increments('id');
			$table->unsignedInteger('group_id')->index();
			$table->string('name');
			$table->string('author');
			$table->string('publication');
			$table->string('description');
			$table->string('ISBN');
			$table->string('imageName')->default('image.png');
			$table->string('imageAddress')->default('/uploads/Books/');
			$table->timestamps();

			$table->foreign('group_id')
			      ->references('id')
			      ->on('groups')
			      ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('books');
	}
}
