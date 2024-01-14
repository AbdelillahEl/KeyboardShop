<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Show Contact Form
    public function create(){
        return view('keyboards.contact');
    }
    //Send Contact Form
    public function store(Request $request){
        $formfield= $request->validate([
            'email' => ['email', 'required'],
            'message' => 'required',
        ]);
        Contact::create($formfield);
        return redirect('/')->with('message', 'Your message has been sent');
    }
    
}
