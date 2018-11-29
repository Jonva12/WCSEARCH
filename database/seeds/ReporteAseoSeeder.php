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
        for($i = 0; $i < 5, $i++){
          DB::table('reportes_aseos')->insert([
            'tipo' => 'info',
            'comentario' => 'blablabla',
          ]);
        }
    }
}
