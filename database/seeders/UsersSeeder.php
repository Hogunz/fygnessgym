<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        $owner = User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('owner'),
        ]);

        Role::create(['name' => 'owner']);
        $owner->assignRole('owner');

        Role::create(['name' => 'admin']);
        $adminUser->assignRole('admin');
    }
}
