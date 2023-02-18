<?php

namespace App\Domain\Models;

use Illuminate\Support\Collection;

class AjikkoRecipeWithEiyo
{
    public function __construct
    (
        public int $id,
        public string $title,
        public string $description,
        public string $sourceUrl,
        public float $howMany,
        public string $foodImageUrl,
        public string $mediumImageUrl,
        public string $smallImageUrl,
        public string $createdAt,
        public string $updatedAt,
        public Collection $eiyos,
    ) {}

    public function howMany():float
    {
        return $this->howMany;
    }

    public function calorie():string
    {
        return (string)$this->eiyos->sum(function(AjikkoRecipeEiyo $eiyo){
            return $eiyo->calorie();
        });
    }

    public function salt():string
    {
        return (string)$this->eiyos->sum(function(AjikkoRecipeEiyo $eiyo){
            return $eiyo->salt();
        });
    }

}
