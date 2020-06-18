<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
