<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $data = Article::latest()->get();
        return view('landing.pages.index', [
            'data' => $data
        ]);
    }

    public function articleDetail($slug)
    {
        $data = Article::where('slug', $slug)->first();
        $article_id = $data->id;
        $comments = Comment::where('article_id', $article_id)->latest()->get();
        $commentsCount = Comment::where('article_id', $article_id)->count();
        return view('landing.pages.detail', [
            'data' => $data,
            'comments' => $comments,
            'commentsCount' => $commentsCount,
        ]);
    }

    public function commentPost(Request $request)
    {
        $validatedData = $request->validate([
            'article_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);

        Comment::create($validatedData);
        return redirect()->route('landing.index')->with('toast_success', 'Komentar Berhasil Ditambah!');
    }
}
