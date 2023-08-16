<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    
}
