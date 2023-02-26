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

    public function volume()
    {
        $value = $this->volume;
        $formatted_number = sprintf("%.0f" , $value);
        return $formatted_number;
    }

    public function prot()
    {
        $value = $this->prot * ($this->volume / 100);
        $formatted_number = sprintf("%.0f" , $value);
        return $formatted_number;
    }

    public function fat()
    {
        $value = $this->fat * ($this->volume / 100);
        $formatted_number = sprintf("%.0f" , $value);
        return $formatted_number;

    }

    public function carbo()
    {
        $value = $this->carbo * ($this->volume / 100);
        $formatted_number = sprintf("%.0f" , $value);
        return $formatted_number;

    }

    public function calorie()
    {
        $value = $this->enercKcal * ($this->volume / 100);
        $formatted_number = sprintf("%.0f" , $value);
        return $formatted_number;

    }

    public function salt()
    {
        $value = $this->naclEq * ($this->volume / 100);
        $formatted_number = sprintf("%.0f" , $value);
        return $formatted_number;
    }

}
