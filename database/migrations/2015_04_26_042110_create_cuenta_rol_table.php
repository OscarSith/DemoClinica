<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaRolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuenta_rol', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_app');
			$table->integer('rol_id')->unsigned();
			$table->integer('cuenta_id')->unsigned();
			$table->timestamps();

			$table->foreign('rol_id')->references('id')->on('rol');
			$table->foreign('cuenta_id')->references('id')->on('cuenta');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuenta_rol');
	}

}
