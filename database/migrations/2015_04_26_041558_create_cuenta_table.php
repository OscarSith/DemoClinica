<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuenta', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('login');
			$table->string('password', 60);
			$table->integer('personal_id')->unsigned();
			$table->timestamps();

			$table->foreign('personal_id')->references('id')->on('personal');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuenta');
	}

}
