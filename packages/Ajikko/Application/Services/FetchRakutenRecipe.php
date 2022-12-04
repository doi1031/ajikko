<?php

namespace Ajikko\Application\Services;

use Symfony\Component\Console\Helper\ProgressBar;

class FetchRakutenRecipe
{
    private const API_URL = 'https://app.rakuten.co.jp/services/api/';
    private const RECIPE_CATEGORY_LIST = 'Recipe/CategoryList/';
    private const RECIPE_CATEGORY_RANKING = 'Recipe/CategoryRanking/';
    private const API_VERSION = '20170426';
    /** @var ProgressBar */
    public $progressBar;

    public function setProgressBar(ProgressBar $progressBar):void
    {
        $this->progressBar = $progressBar;
    }

    public function fetchCategoryList():array
    {
        $query = http_build_query([
            'format' => 'json',
            'applicationId' => config('services.rakuten_developers.application_id'),
        ]);
        $url = sprintf('%s%s%s?%s',
            self::API_URL,
            self::RECIPE_CATEGORY_LIST,
            self::API_VERSION,
            $query
        );
        $response = json_decode(file_get_contents($url), true);
        return $response['result'];
    }

    public function __invoke():array
    {
        $mediumLargeKeyValue = [];
        $recipes = [];
        $allCategories = $this->fetchCategoryList();
        foreach ($allCategories as $categoryType => $categories) {
            foreach ($categories as $category) {
                switch ($categoryType) {
                    case 'large':
                        $categoryId = sprintf('%s', $category['categoryId']);
                        break;
                    case 'medium':
                        $mediumLargeKeyValue[$category['categoryId']] = $category['parentCategoryId'];
                        $categoryId = sprintf('%s-%s', $category['parentCategoryId'], $category['categoryId']);
                        break;
                    case 'small':
                        $categoryId = sprintf('%s-%s-%s', $mediumLargeKeyValue[$category['parentCategoryId']], $category['parentCategoryId'], $category['categoryId']);
                        break;
                }
                $query = http_build_query([
                    'format' => 'json',
                    'applicationId' => config('services.rakuten_developers.application_id'),
                    'categoryId' => $categoryId,
                ]);
                $url = sprintf('%s%s%s?%s',
                    self::API_URL,
                    self::RECIPE_CATEGORY_RANKING,
                    self::API_VERSION,
                    $query
                );
                try {
                    $response = json_decode(file_get_contents($url), true);
                } catch (\Exception $e) {
                    sleep(5);
                    $response = json_decode(file_get_contents($url), true);
                }
                sleep(1);
                foreach ($response['result'] as $recipe) {
                    $recipes[$recipe['recipeId']] = $recipe;
                    if (null !== $this->progressBar) {
                        $this->progressBar->advance();
                    }
                }
            }
        }
        return $recipes;
    }
}
