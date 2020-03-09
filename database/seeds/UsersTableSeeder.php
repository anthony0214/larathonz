<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;


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
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $doctorRole = Role::where('name','doctor')->first();
        $secretaryRole = Role::where('name','secretary')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name'      => 'Admin User',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('welcome@123'),
        ]);
        $doctor = User::create([
            'name'      => 'Doctor User',
            'email'     => 'docotor@doctor.com',
            'password'  => Hash::make('welcome@123'),
        ]);
        $secretary = User::create([
            'name'      => 'Secretary User',
            'email'     => 'secretary@secretary.com',
            'password'  => Hash::make('welcome@123'),
        ]);
        $user = User::create([
            'name'      => 'Normal User',
            'email'     => 'user@user.com',
            'password'  => Hash::make('welcome@123'),
        ]);

        $admin->roles()->attach($adminRole);
        $doctor->roles()->attach($doctorRole);
        $secretary->roles()->attach($secretaryRole);
        $user->roles()->attach($userRole);
    }
}
