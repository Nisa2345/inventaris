<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // membuat sample role
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Administrator";
        $adminRole->save();


        // membuat sample admin
        $admin = new User();
        $admin->name = 'Nisa Rahmawati';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('12345678');
        $admin->save();
        $admin->attachRole($adminRole);
    }
}
