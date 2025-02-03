<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @param CategoryService $service
     * @return Response
     */
    public function index(CategoryService $service): Response
    {
        try{
            return $this->json($service->getCategories()->toArray());
        }catch (\Exception $ex){
            return $this->jsonServerError($ex->getMessage());
        }
    }
}
