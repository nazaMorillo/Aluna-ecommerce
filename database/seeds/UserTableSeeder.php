<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $user = new User();
        $user->name = 'Lucho';
        $user->email = 'Luchoweb15@gmail.com';
        $user->password = bcrypt('l19862020o');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Lucio';
        $user->email = 'lucio@allmarket.com';
        $user->password = bcrypt('l19862020o');
        $user->save();
        $user->roles()->attach($role_admin);
    } 
    }
}
