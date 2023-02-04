<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjikkoRecipeEiyo extends Model
{
    protected $fillable = [
        'ajikko_recipe_id',
        'eiyo_id',
        'volume',
    ];

    public $timestamps = false;

    public function eiyo()
    {
        return $this->hasOne(Eiyo::class, 'id', 'eiyo_id');
    }
}
