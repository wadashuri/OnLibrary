<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $fillable = ['user_id', 'comment','title','author','video','affiliate',];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function categories()
  {
    return $this->belongsToMany(Category::class, 'category_posts', 'post_id', 'category_id');
  }

  public function book_tuber_categories()
  {
    return $this->belongsToMany(BookTuberCategory::class);
  }

  public function likes()
  {
    return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
  }
}
