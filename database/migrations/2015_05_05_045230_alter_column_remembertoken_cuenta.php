<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnRemembertokenCuenta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cuenta', function(Blueprint $table)
		{
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::table('cuenta', function(Blueprint $table)
		// {
		// 	$table->dropColumn('rememberToken');
		// });
	}

}
