<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        if(!Auth::user()->is_admin){
            abort(403);
        }
        else{
            return view('articles.create');
        }

        
    }

    public function store(Request $request){
        //alleen admins mogen dit
        if(!Auth::user()->is_admin){
            abort(403);
        }else{

        

        $validated = $request->validate([
            'title' => 'required|min:3',
            'message' => 'required|min:15',
        ]);

        $article = new Article;
        $imageLink = NULL;
        
        if($request->file('image') != NULL){
            
            $imageName = $request->file('image')->getClientOriginalName();
            $imageLink = 'images/'.$imageName;
            $request->file('image')->move(public_path('images'), $imageName);
            $article->image = $imageLink;
        }
        
        
        $article->title = $validated['title'];
        $article->message = $validated['message'];
        $article->save();

        return redirect()->route('index')->with('status', 'Article added!');
        }
    }

    public function edit($id){
        $article = Article::findOrFail($id);

        //alleen admins mogen dit
        if(!Auth::user()->is_admin){
            abort(403);
        }else{

            return view('articles.edit', compact('article'));
        }
    }

    public function update($id,Request $request){
        

        //alleen admins mogen dit
        if(!Auth::user()->is_admin){
            abort(403);
        }else{
            $article = Article::findOrFail($id);
        
        
        $validated = $request->validate([
            'title' => 'required|min:3',
            'message' => 'required|min:15',
        ]);

        if($request->file('image') != NULL){
            
            $imageName = $request->file('image')->getClientOriginalName();
            $imageLink = 'images/'.$imageName;
            $request->file('image')->move(public_path('images'), $imageName);
            $article->image = $imageLink;
        }

        $article->title = $validated['title'];
        $article->message = $validated['message'];
        $article->save();

        return redirect()->route('article_update')->with('status', 'Article updated!');
        }
    
    }

    public function destroy($id){
        if(Auth::user()->is_admin){
            $article = Article::findOrFail($id);
            $article->delete();

            return redirect()->route('index')->with('status', 'Article deleted successfully');
        }
        else abort(403, "Only admins can delete articles");
        
    }
}
