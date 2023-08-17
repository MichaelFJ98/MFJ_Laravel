<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    //question only belongs to 1 category
    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

    
}
