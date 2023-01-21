<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $fillable = ['user_id', 'comment', 'title', 'author', 'video', 'affiliate'];

  // ========================================================================

  //****************************************
  //     リレーション設定
  //****************************************
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


  // ========================================================================

  //****************************************
  //     スコープ設定
  //****************************************

  public function scopeSearchPost($query, $search, $category, $book_tuber_category)
  {
    $query->when($search, function ($query, $search) {
      $query->where(function ($query) use ($search) {
        $query->where('title', 'LIKE', "%{$search}%")
          ->orWhere('author', 'LIKE', "%{$search}%");
      });
    });
    $query->when($category, function ($query, $category) {
      $query->whereHas('categories', function ($query) use ($category) {
        $query->whereIn('category_id', $category);
      });
    });
    $query->when($book_tuber_category, function ($query, $book_tuber_category) {
      $query->whereHas('book_tuber_categories', function ($query) use ($book_tuber_category) {
        $query->whereIn('book_tuber_category_id', $book_tuber_category);
      });
    });
  }
}
