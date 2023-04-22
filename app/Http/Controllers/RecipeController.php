<?php

namespace App\Http\Controllers;

use App\Models\AjikkoRecipeEiyo;
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
        $username = 'pfc';
        $password = 'pfc';
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
            $_SERVER['PHP_AUTH_USER'] != $username || $_SERVER['PHP_AUTH_PW'] != $password) {
            header('WWW-Authenticate: Basic realm="Restricted Area"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'このページにアクセスするにはログインが必要です。';
            exit;
        }
        // 日常的に使う食材に検索対象を限定しておく処理

        $eiyos = Eiyo::query()
            ->where( 'active_flg', true)
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
        $fileName = request()->file('photo')->store('images');
        $content = request()->input();
        $data = [
            'title' => $content['recipe_title'],
            'description' => $content['description_text'],
            'how_many' => $content['how_many'],
            'source_url' => $content['motoneta_url']??'',
            'food_image_url' => $fileName,
            'small_image_url' => '',
            'medium_image_url' => '',
        ];
        /** @var AjikkoRecipe $ajikkoRecipe */
        $ajikkoRecipe = AjikkoRecipe::create($data);
        foreach ($content['food'] as $food) {
            if ($food['id']) {
                $data = [
                    'ajikko_recipe_id' => $ajikkoRecipe->id,
                    'eiyo_id' => $food['id'],
                    'volume' => $food['volume'],
                ];
                AjikkoRecipeEiyo::create($data);
            }
        }
    }

}
