<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'Admin',
            'lastname' => 'Manager',
            'email' => 'admin@admin.com',
            'phone' => '+443122131359',
            'status' => 'Approve',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('administrator');
    }
}
