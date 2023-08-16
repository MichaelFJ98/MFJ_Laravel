<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth',  ['except' => ['index']]);
    }
    
    public function index(Request $request){

        $categories = Category::latest()->paginate(1);

        return view('categories.index', compact('categories'));
    }

    public function create(){
        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        return view('categories.create');
    }

    public function store(Request $request){
        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);
        
        $category = new Category;
        $category->name = $validated['name'];
        $category->save();

        return redirect()->route('index_qna')->with('status', 'category added!');
    }

    public function edit($id){
        $category = Category::findOrFail($id);

        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        return view('categories.edit', compact('category'));
    }

    public function update($id,Request $request){
        $category = Category::findOrFail($id);

        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }
        
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);

        $category->name = $validated['name'];
        $category->save();

        return redirect()->route('category_update')->with('status', 'Category updated!');
    }
}
