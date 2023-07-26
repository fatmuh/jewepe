<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'kesehatan';
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'slug',
        'content',
        'thumbnail',
    ];

    public function comment()
    {
        return $this->hasOne(Comment::class, 'article_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
