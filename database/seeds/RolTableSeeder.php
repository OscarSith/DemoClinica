<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('rol')->insert(['nombre' => 'Administrador']);
		DB::table('rol')->insert(['nombre' => 'Secretaria']);
		DB::table('rol')->insert(['nombre' => 'Biologo']);
		DB::table('rol')->insert(['nombre' => 'Jefe']);
	}
}