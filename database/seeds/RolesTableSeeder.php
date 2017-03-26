<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name         = 'Administradora';
        $admin->display_name = 'Administradora'; // optional
        $admin->description  = 'La administradora podra ingresar alumnos, asignarlos a un grado y seccion'; // optional
        $admin->save();

        $user = User::find(1);
        $user->attachRole($admin);

        $principal = new Role();
        $principal->name         = 'Directora';
        $principal->display_name = 'Directora'; // optional
        $principal->description  = 'La directora podra ingresar catedraticos, asignarles grados, seccion o materia'; // optional
        $principal->save();

        $user = User::find(2);
        $user->attachRole($principal);

        $professor = new Role();
        $professor->name         = 'Catedratico';
        $professor->display_name = 'Catedratico'; // optional
        $professor->description  = 'El catedratico podra ingresar notas y editarlas'; // optional
        $professor->save();

        $user = User::find(3);
        $user->attachRole($professor);
    }
}
