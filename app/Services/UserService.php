<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;

class UserService
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data): mixed
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
