<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paciente', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipo_analisis');
			$table->integer('persona_id')->unsigned();
			$table->integer('servicio_id')->unsigned();
			$table->timestamps();

			$table->foreign('persona_id')->references('id')->on('persona');
			$table->foreign('servicio_id')->references('id')->on('servicio');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('paciente');
	}

}
