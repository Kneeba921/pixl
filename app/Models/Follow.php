<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  /** @use HasFactory<\Database\Factories\FollowFactory> */
  use HasFactory;

  protected $fillable = [
    'follower_profile_id',
    'following_profile_id'
  ];

  public function follower()
  {
    return $this->belongsTo(Profile::class, 'follower_profile_id');
  }

  public function following_profile_id()
  {
    return $this->belongsTo(Profile::class, 'following_profile_id');
  }
}
