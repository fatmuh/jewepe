<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = Article::latest()->get();
        return view('pages.artikel.index', [
            'data' => $data,
        ]);
    }

    public function articleCreate()
    {
        return view('pages.artikel.create');
    }

    public function articlePost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|file|max:2048',
            'is_comment' => 'required',
        ]);

        if($request->file('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnail');
        }

        $slug = Str::slug($validatedData['title']);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = $slug;

        Article::create($validatedData);
        return redirect()->route('admin.index')->with('toast_success', 'Artikel Berhasil Ditambah!');
    }

    public function articleEdit($slug)
    {
        $data = Article::where('slug', $slug)->first();
        return view('pages.artikel.edit', [
            'data' => $data,
        ]);
    }

    public function articleUpdate(Request $request, $slug)
    {
        $item = Article::where('slug', $slug)->first();
        $data = $request->except(['_token']);

        if($request->file('thumbnail')) {
            if($request->oldthumbnail){
                Storage::delete($request->oldThumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail');
        }

        $slug = Str::slug($data['title']);
        $data['slug'] = $slug;

        $item->update($data);
        return redirect()->route('admin.index')->with('toast_success', 'Artikel Berhasil Diubah!');
    }

    public function articleDelete($id)
    {
        $item = Article::findOrFail($id);
        if($item->thumbnail){
            Storage::delete($item->thumbnail);
        }
        $item->delete();
        return redirect()->route('admin.index')->with('toast_success', 'Artikel Berhasil Dihapus!');
    }
}
