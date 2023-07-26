<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
}
