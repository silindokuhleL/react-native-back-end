<?php

namespace Database\Seeders;

use App\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::ADMIN->value
            ],
            [
                'name' => 'Salon Owner',
                'email' => 'owner@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::SALON_OWNER->value
            ],
            [
                'name' => 'Receptionist',
                'email' => 'receptionist@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::RECEPTIONIST->value
            ],
            [
                'name' => 'Stylist',
                'email' => 'stylist@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::STYLIST->value
            ],
            [
                'name' => 'Inventory Manager',
                'email' => 'inventory@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::INVENTORY_MANAGER->value
            ],
            [
                'name' => 'Marketing Manager',
                'email' => 'marketing@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::MARKETING_MANAGER->value
            ],
            [
                'name' => 'Accountant',
                'email' => 'accountant@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::ACCOUNTANT->value
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::CUSTOMER->value
            ],
            [
                'name' => 'Service Provider',
                'email' => 'provider@gmail.com',
                'password' => 'password',
                'role' => RoleEnum::SERVICE_PROVIDER->value
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['password']),
            ]);

            $role = Role::where('name', $userData['role'])->first();
            if ($role) {
                $user->assignRole($role);
            }
        }
    }
}
