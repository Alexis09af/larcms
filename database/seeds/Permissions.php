<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        // crud post (Create, Read, Update, Delete)
        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();

        // update others post
        $updateOthersPost = new Permission();
        $updateOthersPost->name = "update-others-post";
        $updateOthersPost->save();

        // delete others post
        $deleteOthersPost = new Permission();
        $deleteOthersPost->name = "delete-others-post";
        $deleteOthersPost->save();

        // crud category
        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        // crud user
        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        // attach roles permissions
        $admin = Role::whereName('admin')->first();
        $moderador = Role::whereName('moderador')->first();
        $autor = Role::whereName('autor')->first();


        //Añadimos los roles a los usuarios.
        $admin->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);
        $admin->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);

        $moderador->detachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);
        $moderador->attachPermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);

        $autor->detachPermission($crudPost);
        $autor->attachPermission($crudPost);

    }
}
