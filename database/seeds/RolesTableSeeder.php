<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $roles = [
           [ "name" => "Administrador"],
           [ "name"=>"Vendedor"]
        ];

        foreach ($roles as $key => $rol) {
            Role::create($rol);
       }
    }
}
