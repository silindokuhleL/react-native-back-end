<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * @param CreateUserRequest $request
     * @param UserService $service
     * @return Response
     * */
    public function store(CreateUserRequest $request, UserService $service): Response
    {
        try {

            return $this->json($$service->createUser($request->all())->toArray());
        } catch (\Exception $ex) {

            return $this->jsonServerError($ex->getMessage());
        }
    }
}
