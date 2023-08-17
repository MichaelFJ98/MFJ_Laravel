<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){

        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    public function profile($id){
        $user = User::findOrFail($id);

        return view('users.profile', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);

        //alleen admins mogen dit
        // if(!Auth::user()->is_admin){
        //     abort(403);
        // }

        return view('users.edit', compact('user'));
    }

    public function update($id,Request $request){
        $user = User::findOrFail($id);



        if(!$request->is_admin){
            $validated = $request->validate([
                'name' => 'required|min:3',
                'bio' => 'required|min:3',
                'birthday' => 'required',
                
            ]); 
    
            $avatarLink = NULL;
    
            if($request->file('avatar') != NULL){
                
                $avatarName = $request->file('avatar')->getClientOriginalName();
                $avatarLink = 'avatars/'.$avatarName;
                $request->file('avatar')->move(public_path('avatars'), $avatarName);
                $user->avatar = $avatarLink;
            }
            
            $user->name = $validated['name'];
            $user->bio = $validated['bio'];
            $user->birthday = $validated['birthday'];
            $user->save();
            
            return redirect()->route('index')->with('status', 'Profile updated!');
        }
        else{
            $status = false;
            if($request->is_admin == "on"){
                $status = true;
            }
            $user->is_admin = $status;
            $user->save();
            return redirect()->route('index')->with('status', 'Userpowers updated!');
        }
        
    }
}
