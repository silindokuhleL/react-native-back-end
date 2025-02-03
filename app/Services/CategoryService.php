<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return Category::with('services')->get();
    }

}
