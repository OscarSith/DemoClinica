<?php

use Illuminate\Database\Seeder;

class ServicioTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('servicio')->insert(['nombre' => 'Espermatograma']);
		DB::table('servicio')->insert(['nombre' => 'Capacitación Espermática']);
		DB::table('servicio')->insert(['nombre' => 'Fragmentación del ADN']);
		DB::table('servicio')->insert(['nombre' => 'Congelación']);
		DB::table('servicio')->insert(['nombre' => 'Alto Riesgo']);
		DB::table('servicio')->insert(['nombre' => 'Donantes']);
	}
}