<?php

use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
          'nombre' => 'normal',
        ]);
       	DB::table('roles')->insert([
          'nombre' => 'premium',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'admin',
          ]);
    }
}
