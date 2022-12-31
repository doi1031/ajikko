<?php

namespace Database\Seeders;

use App\Models\AjikkoRecipe;
use App\Models\RakutenRecipe;
use Illuminate\Database\Seeder;

class AjikkoRecipeSeeder extends Seeder
{
    private const ADOPTED_RECIPE_IDS = [
        1570003792,
        1860023243,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RakutenRecipe::query()
            ->whereIn('id', self::ADOPTED_RECIPE_IDS)
            ->get()
            ->each(function(RakutenRecipe $rakutenRecipe){
                AjikkoRecipe::updateOrCreate([
                    'source_url' => $rakutenRecipe->url
                ],[
                    'title' => $rakutenRecipe->title,
                    'description' => $rakutenRecipe->description,
                    'food_image_url' => $rakutenRecipe->food_image_url,
                    'medium_image_url' => $rakutenRecipe->medium_image_url,
                    'small_image_url' => $rakutenRecipe->small_image_url,
                ]);
            });
    }
}
