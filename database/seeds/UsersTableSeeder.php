<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $adminRole=Role::where('name','admin')->first();
        $admin=User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin')
        ]);
        $admin->roles()->attach($adminRole);
    }
}
