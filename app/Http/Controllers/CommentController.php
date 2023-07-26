<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::latest()->get();
        return view('pages.comment.index', [
            'data' => $data,
        ]);
    }

    public function commentDelete($id)
    {
        $item = Comment::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.comment.index')->with('toast_success', 'Komentar Berhasil Dihapus!');
    }
}
