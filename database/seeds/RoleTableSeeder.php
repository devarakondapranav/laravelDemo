<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user = new Role();
        $role_user->name = "CorporateClient";
        $role_user->description = "The corporate client";
        $role_user->save();

        $role_manager = new Role();
        $role_manager->name = "Manager";
        $role_manager->description = "The manager of a team";
        $role_manager->save();

        $role_admin = new Role();
        $role_admin->name = "Admin";
        $role_admin->description = "The admin";
        $role_admin->save();
    }
}
