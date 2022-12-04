<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class RakutenRecipe extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'material' => AsCollection::class,
    ];
}
