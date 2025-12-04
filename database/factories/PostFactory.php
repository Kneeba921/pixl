<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'profile_id' => Profile::factory(),
      'parent_id' => null,
      'repost_of_id' => null,
      'content' => $this->faker->realText(200)
    ];
  }

  public function reply(Post $parentPost)
  {
    return $this->state([
      'parent_id' => $parentPost->id,
      'content' => $this->faker->realText(200)
    ]);
  }

  public function repost(Post $originalPost)
  {
    return $this->state([
      'repost_of_id' => $originalPost->id,
      'content' => null
    ]);
  }

  public function quotePost(Post $originalPost)
  {
    return $this->state([
      'repost_of_id' => $originalPost->id,
      'content' => $this->faker->realText(200)
    ]);
  }
}
