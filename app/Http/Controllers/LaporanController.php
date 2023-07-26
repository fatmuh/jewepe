<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Article::latest()->get();
        $commentsCount = [];
        foreach ($data as $article) {
            $article_id = $article->id;
            $commentsCount[$article_id] = Comment::where('article_id', $article_id)->count();
        }
        return view('pages.laporan.index', [
            'data' => $data,
            'commentsCount' => $commentsCount,
        ]);
    }
}
