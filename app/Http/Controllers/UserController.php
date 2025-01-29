<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;
class UserController extends Controller
{
    /**
     * @param CreateUserRequest $request
     * @param UserService $service
     * @return Response
     * */
    public function store(Request $request, UserService $service): Response
    {
        try {
            $result = $service->createUser($request->all());
            return $this->json($result);  // Remove toArray() call since $result is already an array
        } catch (\Exception $ex) {
            Log::error('UserController.store failed', [
                'exception' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            return $this->jsonServerError($ex->getMessage());
        }
    }

    public function login(LoginRequest $request){

        Log::info('User login attempt', ['email' => $request->email]);
        $user = User::where('email', $request->email )->first();

        if(!$user || !hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $this->json(['token' => $user->createToken('api-token')->plainTextToken]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
