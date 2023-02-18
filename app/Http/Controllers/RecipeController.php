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
        // 日常的に使う食材に検索対象を限定しておく処理
        $targetIds = [4,128,134,211,216,237,279,356,359,380,551,553,571,606,631,670,671,674,701,707,724,728,733,772,780,810,874,996,1011,1018,1035,1044,1069,1083,1089,1093,1149,1258,1616,1618,1619,1623,1625,1627,1629,1633,1638,1640,1641,1696,1698,1699,1703,1705,1707,1709,1713,1718,1720,1721,1725,1759,1763,1765,1767,1772,1774,1776,1780,1811,1875,1876,1877,1878,1879,1880,1902,1904,1905,1906,1908,1909,1912,1923,1944,2002,2003,2004,2005,2245,2281,2282,2285,2288,2289,2297,2323,2324,2325,2327,2333,2348,2389,2404,];

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
        $fileName = request()->file('photo')->store('images');
        $content = request()->input();
        $data = [
            'title' => $content['recipe_title'],
            'description' => $content['description_text'],
            'how_many' => $content['how_many'],
            'source_url' => $content['motoneta_url'],
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
