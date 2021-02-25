<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

  public function likes(): MorphMany
  {
    return $this->morphMany(Like::class, 'likeable');
  }
}
