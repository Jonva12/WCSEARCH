<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
          DB::table('usuarios')->insert([
            'nombre' => 'nombrePrueba'.str_random(1),
            'email' => 'hola'.random_int(1,5).'@gmail.com',
            'contrasena' => 'passwordprueba',
            'puntuacion' => random_int(1,100),
            'reportes' => 0,
          ]);
        }
    }
}
