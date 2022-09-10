<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTuberCategoryPost extends Model
{
    use HasFactory;

    protected $fillable = ['book_tuber_category_id','post_id'];

    public $timestamps = false;
}
