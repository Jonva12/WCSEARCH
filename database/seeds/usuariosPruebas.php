<?php

use Illuminate\Database\Seeder;

class usuariosPruebas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Prueba',
            'email' => 'prueba@gmail.com',
            'password' => '$2y$10$WAIlqJoaSMLgpG.FlXSzzOb.Xm54T/LSbGWvSyKTdZtP3j/Y92MYy',
            'puntuacion' => random_int(1,100),
            'reportes' => 0,
            'email_verified_at' => '2019-01-10 09:52:37',
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$WAIlqJoaSMLgpG.FlXSzzOb.Xm54T/LSbGWvSyKTdZtP3j/Y92MYy',
            'puntuacion' => random_int(1,100),
            'reportes' => 0,
            'email_verified_at' => '2019-01-10 09:52:37',
            'role_id' => '3',
        ]);
    }
}
