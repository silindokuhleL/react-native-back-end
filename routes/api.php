<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        $user = $request->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()->pluck('name'),
            'email_verified_at' => $user->email_verified_at,
        ]);
    });
    Route::put('/user/update', [UserController::class, 'update']);
    Route::post('/logout', [UserController::class, 'destroy']);
});

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
