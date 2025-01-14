<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @param UserService $service
     * @return Response
     */
    public function store(Request $request, UserService $service): Response
    {
        Log::info("UserController store", $request->all());
        try {
            return $this->json($service->createUser($request->all())->toArray());
        } catch (\Exception $ex) {
            return $this->jsonServerError($ex);
        }
    }
}
