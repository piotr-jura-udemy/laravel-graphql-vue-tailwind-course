<?php

namespace App\Models;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

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

  public function related(): BelongsToMany
  {
    return $this->belongsToMany(Post::class, 'related_posts', 'original_post_id', 'related_post_id');
  }

  protected static function booted()
  {
    static::saving(function ($post) {
      if ($post->markdown) {
        $content = Markdown::convertToHtml($post->markdown);

        $content = preg_replace_callback('/<h2 ?.*>(.*)<\/h2>/', function ($matches) {
          $title = $matches[1];
          $slug = Str::slug($title);

          return "<h2 id=\"$slug\" class=\"text-2xl font-medium text-gray-700 dark:text-gray-200\">$title</h2>";
        }, $content);

        $content = preg_replace_callback('/<code>([^<]*)<\/code>/', function ($matches) {
          $code = $matches[1];
          var_dump($matches);
          return "<code class=\"bg-indigo-50 dark:bg-indigo-900 dark:text-gray-100 p-1 rounded-md text-lg\">$code</code>";
        }, $content);

        $content = preg_replace('/language-([a-z]+)/', '$1', $content);
        $content = preg_replace('/<p>/', '<p class="leading-loose">', $content);

        $post->content = $content;
      }
    });
  }
}
