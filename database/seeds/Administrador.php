<?php

use Illuminate\Database\Seeder;
use App\Usuarios;

class Administrador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Usuarios::create([
            'Nombre'=>'Alejandro',
            'Apellidos'=>'Jaimes Donatto',
            'Nick'=>'ADMIN',
            'password'=>bcrypt('alejandro'),
            'TipoUsuario'=>'Administrador',
            'email'=>'ale_donatto@yahoo.com.mx',
            'regComp'=>'si'
        ]);
    }
}
