<?php

use Illuminate\Database\Seeder;

class usuariosSeeder extends Seeder
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
            'nombre' => 'nombrePrueba'.str_randmom(1),
            'email' => 'hola'.random_int(1,5).'@gmail.com',
            'contraseña' => 'passwordprueba',
            'puntuacion' => random_int(1,100),
          ]);
        }
    }
}
