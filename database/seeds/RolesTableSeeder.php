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

        DB::table('roles')->truncate();
        // Admin
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Administrador";
        $admin->save();

        // Moderador
        $moderador = new Role();
        $moderador->name = "moderador";
        $moderador->display_name = "Moderador";
        $moderador->save();

        // Autor
        $autor = new Role();
        $autor->name = "autor";
        $autor->display_name = "Autor";
        $autor->save();


        //Asignamos roles
        $usuario1 = user::find(1);
        $usuario1->detachRole($admin);
        $usuario1->attachRole($admin);


        $usuario2 = user::find(2);
        $usuario2->detachRole($moderador);
        $usuario2->attachRole($moderador);

        $usuario3 = user::find(3);
        $usuario3->detachRole($autor);
        $usuario3->attachRole($autor);
    }
}
