<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = "admin";
        $user->email = "i_am_admin@gmail.com";
        $user->password = "admin";
        $user->designation = "admin";
        $user->save();
        $user->roles()->attach($role_user);
    }
}
