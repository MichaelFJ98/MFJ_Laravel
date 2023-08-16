<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Auth;

class ArticleController extends Controller
{

    public function __construct(){
        $this->middleware('auth',  ['except' => ['index']]);
    }



    public function index(Request $request){

        $articles = Article::latest()->paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function create(){
        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        return view('articles.create');
    }

    public function store(Request $request){
        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        $validated = $request->validate([
            'title' => 'required|min:3',
            'message' => 'required|min:15',
        ]);
        
        $article = new Article;
        $article->title = $validated['title'];
        $article->message = $validated['message'];
        $article->save();

        return redirect()->route('index')->with('status', 'Article added!');
    }

    public function edit($id){
        $article = Article::findOrFail($id);

        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        return view('articles.edit', compact('article'));
    }

    public function update($id,Request $request){
        $article = Article::findOrFail($id);

        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }
        
        $validated = $request->validate([
            'title' => 'required|min:3',
            'message' => 'required|min:15',
        ]);

        $article->title = $validated['title'];
        $article->message = $validated['message'];
        $article->save();

        return redirect()->route('article_update')->with('status', 'Article updated!');
    }
}
