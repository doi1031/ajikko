<?php

namespace App\Http\Controllers;

use App\Models\Eiyo;
use App\Models\AjikkoRecipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = AjikkoRecipe::all()->map(function(AjikkoRecipe $ajikkoRecipe){
            return $ajikkoRecipe->toDomain();
        });
        $params = [

            'recipes' => $recipes,
            'recipes' =>AjikkoRecipe::query()->paginate(30)
        ];
        return view('recipes/index', $params);
    }

    public function show($id)
    {
        $ajikkoRecipe = AjikkoRecipe::findOrFail($id)->toDomain();
        $relatedRecipes = AjikkoRecipe::query()
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(8)
            ->get()
            ->map(function(AjikkoRecipe $ajikkoRecipe){
                return $ajikkoRecipe->toDomain();
            });
        $params = [
            'recipe' => $ajikkoRecipe,
            'relatedRecipes' => $relatedRecipes,
        ];
        return view('recipes/show', $params);
    }

    /**
     * 登録フォーム表示するとこ
     * @return void
     */
    public function create()
    {
        // 日常的に使う食材に検索対象を限定しておく処理
        $targetIds = [2478,2674,3840,2992,];

        $eiyos = Eiyo::query()
            ->whereIn( 'id', $targetIds)
            ->get();
        $params = [
            'eiyos' => $eiyos,
        ];
        return view('recipes.form' ,$params);
    }

    /**
     * 登録フォームから送信したレシピデータを保存する処理を置くとこ
     * @return void
     */
    public function store()
    {
        $content = request()->input();
        $data = [
            'title' => $content['recipe_title'],
            'description' => $content['description_text'],
            'source_url' => $content['motoneta_url'],
            'food_image_url' => '',
            'small_image_url' => '',
        ];
        AjikkoRecipe::create($data);
    }

}
