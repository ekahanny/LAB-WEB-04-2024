<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    
    public function about(){
        return view('about');
    }
    
    public function contact(){
        return view('contact');
    }

    public function handleContact(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'topic' => 'required',
    ]);

    return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');

}

}