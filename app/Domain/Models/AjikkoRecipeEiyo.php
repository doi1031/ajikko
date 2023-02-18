<?php

namespace App\Domain\Models;

class AjikkoRecipeEiyo
{
    public function __construct
    (
        public string $name,
        public string $volume,
        public string $enercKcal,
        public float $prot,
        public float $fat,
        public float $carbo,
        public string $naclEq,
    ) {}

    public function prot()
    {
        return $this->prot * ($this->volume / 100);
    }

    public function fat()
    {
        return $this->fat * ($this->volume / 100);
    }

    public function carbo()
    {
        return $this->carbo * ($this->volume / 100);
    }

    public function calorie()
    {
        return $this->enercKcal * ($this->volume / 100);
    }

    public function salt()
    {
        return $this->naclEq * ($this->volume / 100);
    }

}
