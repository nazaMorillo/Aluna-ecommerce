<?php

use App\Role;
use App\User;
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
        $user->surname = 'Martínez'; // null
        $user->name = 'Lucho';
        $user->email = 'Luchoweb15@gmail.com';
        $user->password = bcrypt('l19862020o');
        $user->address =  "DefaultAddress";
        $user->avatar = storage_path("app/public/pics/avatar.png");
        $user->save();
        $user->roles()->attach($role_user);

        // $user = new User();
        // $user->surname = 'Martínez'; //null
        // $user->name = 'Lucio';
        // $user->email = 'lucio@allmarket.com';
        // $user->password = bcrypt('l19862020o');
        // $user->avatar =  "avatar.png";
        // $user->address =  "DefaultAddress";
        // $user->esadmin = 1;
        // $user->save();
        // $user->roles()->attach($role_admin);

        // $user = new User();
        // $user->surname = 'Alexis'; //null
        // $user->name = 'Alexis';
        // $user->email = 'alexis@allmarket.com';
        // $user->password = bcrypt('12345678');
        // $user->avatar =  "avatar.png";
        // $user->address =  "DefaultAddress";
        // $user->esadmin = 1;
        // $user->save();
        // $user->roles()->attach($role_admin);

        // $user = new User();
        // $user->surname = 'Morillo'; //null
        // $user->name = 'Nazareno';
        // $user->email = 'naza@allmarket.com';
        // $user->password = bcrypt('12345678');
        // $user->avatar =  "avatar.png";
        // $user->address =  "DefaultAddress";
        // $user->esadmin = 1;
        // $user->save();
        // $user->roles()->attach($role_admin);
     
    }
}
