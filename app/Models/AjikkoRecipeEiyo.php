<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjikkoRecipeEiyo extends Model
{
    public function eiyo()
    {
        return $this->hasOne(Eiyo::class, 'id', 'eiyo_id');
    }
}
