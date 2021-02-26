<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class RegeneratePosts extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'posts:regenerate';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Regenerate the HTML from posts Markdown';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    Post::all()->each(fn ($post) => $post->save());
    return 0;
  }
}
