<?php

namespace App\Http\Controllers;


class RecipeController extends Controller
{
    private const SAMPLE_1 = [
        'id' => 1,
        'name' => 'すごく健康なすき焼き',
        'thumb' => 'https://thumb.photo-ac.com/6b/6b6b6b0cb5b9d8b484bfbe3d1899ff38_w.jpeg',
        'description' => '前職での定番料理だったすき焼きを赤ワインを入れてアレンジしました。　ビール、焼酎、日本酒はもちろん、赤ワインにも合う（もちろんご飯にも！）味わいです。',
    ];
    private const SAMPLE_2 = [
        'id' => 2,
        'name' => 'とても健康なカレー',
        'thumb' => 'https://thumb.photo-ac.com/29/299b03a56f73e1b781b0c38c3989ef1c_w.jpeg',
        'description' => '茄子に油を先になじませることで少量の油でしっかりと火が入ります。りんごジュースやカレールーの種類によって甘味、辛味が変わりますので量を調節下さい。かき揚げはあまり混ぜすぎないようにさっと混ぜてください。',
    ];

    public function index()
    {
        $params = [
            'recipes' => [
                self::SAMPLE_1,
                self::SAMPLE_2,
            ],
        ];
        return view('recipes/index', $params);
    }

    public function show($id)
    {
        $recipe = $id == 1 ? self::SAMPLE_1 : self::SAMPLE_2;
        return view('recipes/show', $recipe);
    }
}
