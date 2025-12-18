<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  /** @use HasFactory<\Database\Factories\PostFactory> */
  use HasFactory;

  protected $fillable = [
    'parent_id',
    'profile_id',
    'repost_of_id',
    'content'
  ];

  public function profile()
  {
    return $this->belongsTo(Profile::class);
  }

  public function parent()
  {
    return $this->belongsTo(Post::class, 'parent_id');
  }

  public function replies()
  {
    return $this->hasMany(Post::class, 'parent_id');
  }

  public function likes()
  {
    return $this->hasMany(Like::class);
  }

  public function reposts()
  {
    return $this->hasMany(Post::class, 'repost_of_id');
  }

  public function repostOf()
  {
    return $this->belongsTo(Post::class, 'repost_of_id');
  }

  public static function publish(Profile $profile, string $content)
  {
    return static::create([
      'profile_id' => $profile->id,
      'content' => $content,
      'parent_id' => null,
      'repost_of_id' => null
    ]);
  }

  public static function reply(Profile $profile, Post $original, string $content)
  {
    return static::create([
      'profile_id' => $profile->id,
      'content' => $content,
      'parent_id' => $original->id,
      'repost_of_id' => null
    ]);
  }

  public static function repost(Profile $profile, Post $original, string $content = null)
  {

    return static::firstOrCreate([
      'profile_id' => $profile->id,
      'content' => $content,
      'parent_id' => null,
      'repost_of_id' => $original->id
    ]);
  }

  public static function removeRepost(Profile $profile, Post $original)
  {
    return static::where('profile_id', $profile->id)
      ->where('repost_of_id', $original->id)
      ->delete() > 0;
  }
}
