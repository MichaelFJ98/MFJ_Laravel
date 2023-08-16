<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request){

        $articles = Article::paginate(5);

        return view('articles.index', compact('articles'));
    }
}
