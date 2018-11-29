<?php

use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
          DB::table('comentarios')->insert([
            'text' => str_randmom(40),
            'usuario_id' => random_int(1, 5),
            'aseo_id' => random_int(1, 5),
          ]);
        }
    }
}
