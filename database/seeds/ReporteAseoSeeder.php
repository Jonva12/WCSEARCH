<?php

use Illuminate\Database\Seeder;

class ReporteAseoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
          DB::table('reportes_aseos')->insert([
            'tipo' => ['Informacion incorrecta','Existencia'][random_int(0, 1)],
            'comentario' => 'blablabla esta mal',
            'aseo_id' => random_int(1, 5),
          ]);
        }
    }
}
