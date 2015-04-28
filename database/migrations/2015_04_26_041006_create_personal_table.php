<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personal', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cargo_id')->unsigned();
			$table->integer('persona_id')->unsigned();
			$table->timestamps();

			$table->foreign('persona_id')->references('id')->on('persona');
			$table->foreign('cargo_id')->references('id')->on('cargos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personal');
	}

}
