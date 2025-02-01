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

        $role = Role::where('name', RoleEnum::ADMIN->value)
            ->first();

        if ($role) {
            $user->assignRole($role);
        }

        event(new Registered($user));

        $token = $user->createToken('api-token')->plainTextToken;
        return ['token' => $token];
    }
}
