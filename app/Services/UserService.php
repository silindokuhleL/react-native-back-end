<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Auth\Events\Registered;

class UserService
{
    /**
     * @param array $data
     * @return Application|RedirectResponse|Redirector
     */
    public function createUser(array $data): Application|Redirector|RedirectResponse
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
