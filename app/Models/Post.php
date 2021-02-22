<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
  public function topic(): BelongsTo
  {
    return $this->belongsTo(Topic::class);
  }

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'author_id');
  }

  public function sections(): HasMany
  {
    return $this->hasMany(PostSection::class, 'post_id');
  }
}
