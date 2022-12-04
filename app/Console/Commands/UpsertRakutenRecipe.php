<?php

namespace App\Console\Commands;

use Ajikko\Application\Services\FetchRakutenRecipe;
use App\Models\RakutenRecipe;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class UpsertRakutenRecipe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upsert:rakuten-recipe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '楽天のレシピAPIからレシピ情報を取得しDB保存する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fetchRakutenRecipe = new FetchRakutenRecipe();
        $categories = $fetchRakutenRecipe->fetchCategoryList();
        sleep(1);
        $recipeNum = collect($categories)->flatten()->count();
        $progressBar = $this->output->createProgressBar($recipeNum);
        $fetchRakutenRecipe->setProgressBar($progressBar);
        $recipes = Cache::rememberForever('fetch-rakuten-recipe', function () use($fetchRakutenRecipe) {
            $fetchRakutenRecipe->progressBar->start();
            $recipes = ($fetchRakutenRecipe)();
            $fetchRakutenRecipe->progressBar->finish();
            return $recipes;
        });
        $progressBar = $this->output->createProgressBar(count($recipes));
        $progressBar->start();
        foreach ($recipes as $recipe) {
            $data = [
                'food_image_url' => $recipe['foodImageUrl'],
                'medium_image_url' => $recipe['mediumImageUrl'],
                'nickname' => $recipe['nickname'],
                'pickup' => $recipe['pickup'],
                'rank' => $recipe['rank'],
                'cost' => $recipe['recipeCost'],
                'description' => $recipe['recipeDescription'],
                'indication' => $recipe['recipeIndication'],
                'material' => $recipe['recipeMaterial'],
                'publishday' => $recipe['recipePublishday'],
                'title' => $recipe['recipeTitle'],
                'url' => $recipe['recipeUrl'],
                'shop' => $recipe['shop'],
                'small_image_url' => $recipe['smallImageUrl'],
            ];
            RakutenRecipe::updateOrCreate(['id' => $recipe['recipeId']], $data);
            $progressBar->advance();
        }
        $progressBar->finish();
        return Command::SUCCESS;
    }
}
