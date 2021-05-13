<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mail = config('mail.to.address') ?? 'test@test.com';

        $user = User::create([
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'email' => $mail,
        ]);

        $adminId = Role::where('name', 'Administrator')->pluck('id');
        $user->roles()->attach($adminId);
    }
}
