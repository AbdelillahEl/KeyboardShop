<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    public function index(){
        return view('keyboards.index', [
            
            'keyboards' => Keyboard::latest()->filter
            (request(['search']))->paginate(10)
    ]);
    }

    public function show(Keyboard $keyboard){
        
    return view('keyboards.show', ['keyboard' => $keyboard]);
    }

    //Show Create Form
    public function create(){
        return view('keyboards.create');

       
    }  
    
    //Store Keyboard
    public function store(Request $request){
        
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'switches' => 'required',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move(public_path('images'), $filename);
        } else {
            $filename = null;
        }
        Keyboard::create([ 
            'title' => $formFields['title'],
            'description' => $formFields['description'],
            'price' => $formFields['price'],
            'switches' => $formFields['switches'],
            'details' => $formFields['details'],
            'image' => $filename,
        ]);
       return redirect('/')->with('message', 'Keyboard created successfully!');
        
    }
    
    
}
