<?php

namespace App\Services;

use App\RoleEnum;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserService
{

    /**
     * @param array $data
     * @return array
     */
    public function createUser(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $roleName = $data['role'] ?? RoleEnum::CUSTOMER->value;

        if (!in_array($roleName, array_column(RoleEnum::cases(), 'value'))) {
            $roleName = RoleEnum::CUSTOMER->value;
        }

        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user->assignRole($role);
        }

        event(new Registered($user));

        $token = $user->createToken('api-token')->plainTextToken;
        return [
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $roleName
            ]
        ];
    }
}
