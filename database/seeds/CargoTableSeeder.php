<?php
use Illuminate\Database\Seeder;

class CargoTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('cargos')->insert(['cargo' => 'Administrador']);
		DB::table('cargos')->insert(['cargo' => 'Secretaria']);
		DB::table('cargos')->insert(['cargo' => 'Doctor']);
		DB::table('cargos')->insert(['cargo' => 'Biologo']);
		DB::table('cargos')->insert(['cargo' => 'Gerente']);
	}
}