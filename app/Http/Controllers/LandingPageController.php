<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $article = Article::latest()->get();
        return view('landing.pages.index');
    }
}
