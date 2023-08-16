<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function create(){
        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        return view('questions.create');
    }

    public function store( $id, Request $request){
        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        $validated = $request->validate([
            'question' => 'required|min:5',
            'answer' => 'required|min:5',
        ]);  

        $question = new Question;
        $question->question = $validated['question'];
        $question->answer = $validated['answer'];
        $question->cat_id = $id;
        $question->save();

        return redirect()->route('index_qna')->with('status', 'Question added!');
    }
    
}
