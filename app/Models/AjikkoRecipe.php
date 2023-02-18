<?php

namespace App\Models;

use App\Domain\Models\AjikkoRecipeWithEiyo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AjikkoRecipe extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function eiyos()
    {
        return $this->hasMany(AjikkoRecipeEiyo::class);
    }

    public function toDomain():AjikkoRecipeWithEiyo
    {
        $eiyoCollection = $this->eiyos->map(function($eiyo){
            return new \App\Domain\Models\AjikkoRecipeEiyo(
                $eiyo->eiyo->food_name,
                $eiyo->volume,
                $eiyo->eiyo->enerc_kcal,
                $eiyo->eiyo->nacl_eq,
            );
        });
        return new AjikkoRecipeWithEiyo(
            $this->id,
            $this->title,
            $this->description,
            $this->source_url,
            $this->how_many,
            $this->food_image_url,
            $this->medium_image_url,
            $this->small_image_url,
            $this->created_at,
            $this->updated_at,
            $eiyoCollection
        );
    }
}
