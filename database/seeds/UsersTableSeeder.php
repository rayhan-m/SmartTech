<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =new User();
         $user->role_id= '1';
        $user->name="Super Admin";
        $user->email="admin@gmail.com";
        $user->password=bcrypt('12345678');
        $user->phone="123456789";
        $user->save();

        $user =new User();
        $user->name="Customer";
        $user->email="customer@gmail.com";
        $user->password=bcrypt('12345678');
        $user->phone="123456789";
        $user->save();
    }
}