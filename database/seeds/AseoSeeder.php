<?php

use Illuminate\Database\Seeder;

class AseoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
          DB::table('aseos')->insert([
            'nombre' => 'nombreDeAseo'.$i,
            'localizacion' =>  (43.270579 + lcg_value()*(abs(43.325575 - 43.270579))).', '.(-1.952729 + lcg_value()*(abs(-2.014163 - -1.952729))),
            'dir' => 'Euskal Herria, Donosti, calle'.random_int(0,3).' '.random_int(0,3),
            'horario'=>["08:00 - 20:00", "09:00 - 18:30", "24h"][random_int(0, 2)],
            'foto'=>'404.png',
            'precio'=>random_int(0, 3),
            'accesibilidad'=>random_int(0, 1),
            'user_id'=>random_int(1, 5)
          ]);
        }
    }
}
