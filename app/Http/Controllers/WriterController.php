<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    public function dashboard() {
        $unrevisionedArticles = Article::where('user_id' , Auth::user()->id)->where('is_accepted', null)->orderBy('created_at' , 'desc')->get();
        $acceptedArticles = Article::where('user_id' , Auth::user()->id)->where('is_accepted', true)->orderBy('created_at' , 'desc')->get();
        $rejectedArticles = Article::where('user_id' , Auth::user()->id)->where('is_accepted', false)->orderBy('created_at' , 'desc')->get();
        return view('writer.dashboard' , compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }
}
