<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        //alleen admins mogen dit
        if(!Auth::user()->is_admin){
            abort(403);
        }else{

        
        $categories = Category::all();
        return view('questions.create', compact('categories'));
        }
    }

    public function store(Request $request){
        
        if(!Auth::user()->is_admin){
            abort(403);
        }else{

        
        

        $validated = $request->validate([
            'question' => 'required|min:5',
            'answer' => 'required|min:5',
            'cat_id' => 'required',
        ]);  

    

        $question = new Question;
        $question->question = $validated['question'];
        $question->answer = $validated['answer'];
        $question->category_id = $validated['cat_id'];
        $question->save();

        return redirect()->route('index_qna')->with('status', 'Question added!');
        }
    }

    public function edit($id){
        $question = Question::findOrFail($id);

        //alleen admins mogen dit
        if(!Auth::user()->is_admin){
            abort(403);
        }else{

        

        return view('questions.edit', compact('question'));
        }
    }

    public function update($id,Request $request){
        $question = Question::findOrFail($id);

        //alleen admins mogen dit
        if(!Auth::user()->is_admin){
            abort(403);
        }else{

        
        
        $validated = $request->validate([
            'question' => 'required|min:3',
            'answer' => 'required|min:3',
        ]);

        $question->question = $validated['question'];
        $question->answer = $validated['answer'];
        $question->save();

        return redirect()->route('index_qna')->with('status', 'Question updated!');
        }
    }
    
    public function destroy($id){
        if(Auth::user()->is_admin){
            $question = Question::findOrFail($id);
            $question->delete();

            return redirect()->route('index')->with('status', 'Question deleted successfully');
        }
        else abort(403, "Only admins can delete questions");
        
    }
}
