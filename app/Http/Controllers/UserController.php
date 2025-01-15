<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @param UserService $service
     * @return Response
     */
    public function store(Request $request, UserService $service): Response
    {
        try {
            return $this->json($service->createUser($request->all())->toArray());
        } catch (\Exception $ex) {
            return $this->jsonServerError($ex->getMessage());
        }
    }
}
