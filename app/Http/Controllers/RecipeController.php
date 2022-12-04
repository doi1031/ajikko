<?php

namespace App\Http\Controllers;


use App\Models\RakutenRecipe;

class RecipeController extends Controller
{
    public function index()
    {
        $params = [
            'recipes' =>RakutenRecipe::query()->paginate(30)
        ];
        return view('recipes/index', $params);
    }

    public function show($id)
    {
        $params = [
            'recipe' => RakutenRecipe::findOrFail($id),
            'relatedRecipes' => RakutenRecipe::query()
                ->inRandomOrder()
                ->limit(8)
                ->get(),
        ];
        return view('recipes/show', $params);
    }
}
