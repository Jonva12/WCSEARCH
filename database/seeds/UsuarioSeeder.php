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
          DB::table('users')->insert([
            'name' => 'nombrePrueba'.str_random(1),
            'email' => 'hola'.$i.'@gmail.com',
            'password' => 'passwordprueba',
            'puntuacion' => random_int(1,100),
            'reportes' => 0,
          ]);
        }
    }
}
