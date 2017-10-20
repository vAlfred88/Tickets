<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * новые > в разработке > выполнен > отменен
     *
     * @return void
     */
    public function run()
    {
        $adminRole = \App\Role::create(
            [
                'name' => 'admin',
                'label' => 'Administrator',
            ]
        );
        $userRole = \App\Role::create(
            [
                'name' => 'user',
                'label' => 'User',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $adminUser = \App\User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@site.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        $user = \App\User::create(
            [
                'name' => 'user',
                'email' => 'user@site.com',
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $adminUser->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}