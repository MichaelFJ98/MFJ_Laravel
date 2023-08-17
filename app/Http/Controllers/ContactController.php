<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
  public function index(){
    return view('contact.index');
  }

  public function store(Request $request){
    $validated = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ]);

    $contact = new Contact;
    $contact->name = $validated['name'];
    $contact->email = $validated['email'];
    $contact->message = $validated['message'];
    $contact->save();

    return redirect()->route('index')->with('status', 'Message sent!');
  }
}
