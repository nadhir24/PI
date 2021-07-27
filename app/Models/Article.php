<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'article',
        'author',
        'category',
        'img_thumbnail',
        'subject_article',
        'img_banner'
    ];

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
}
