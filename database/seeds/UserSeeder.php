<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new user();
        $user->name='Jacob';
        $user->email = 'yeicob_loredo@hotmail.com';
        $user->password=Hash::make('12345678');
        $user->save();
        $user->roles()->attach([1]);

        $user = new user();
        $user->name='Diseñador';
        $user->email = 'disenador@hotmail.com';
        $user->password=Hash::make('12345678');
        $user->save();
        $user->roles()->attach([1]);

        $user = new user();
        $user->name='DianaLaura';
        $user->email = 'DianaLaura@hotmail.com';
        $user->password=Hash::make('12345678');
        $user->save();
        $user->roles()->attach([1,3]);

        $user = new user();
        $user->name='AnaKaren';
        $user->email = 'AnaKaren@hotmail.com';
        $user->password=Hash::make('12345678');
        $user->save();
        $user->roles()->attach([3]);
      
    }
}
