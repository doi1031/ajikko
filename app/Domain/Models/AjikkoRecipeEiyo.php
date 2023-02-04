<?php

namespace App\Domain\Models;

class AjikkoRecipeEiyo
{
    public function __construct
    (
        public string $name,
        public string $volume,
        public string $enercKcal,
        public string $naclEq,
    ) {}

    public function calorie()
    {
        return $this->enercKcal * ($this->volume / 100);
    }

    public function salt()
    {
        return 0;
        return $this->naclEq * ($this->volume / 100);
    }

}
