<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Profile;

uses(RefreshDatabase::class);

test('it allows a profile to publish a post', function () {
  $profile = Profile::factory()->create();

  $post = Post::publish($profile, 'Content of the post');

  expect($post->exists)->toBeTrue()
    ->and($post->profile)->is($profile)->toBeTrue()
    ->and($post->parent_id)->toBeNull()
    ->and($post->repost_of_id)->toBeNull();
});
