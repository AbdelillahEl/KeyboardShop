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
        $user_id = auth()->id();
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
        if($user_id == null){
            $user_id = 11;
        }
        $formFields['user_id'] = $user_id;
        
        

        Keyboard::create([ 
            'title' => $formFields['title'],
            'user_id' => $user_id,
            'description' => $formFields['description'],
            'price' => $formFields['price'],
            'switches' => $formFields['switches'],
            'details' => $formFields['details'],
            'image' => $filename,
            
        ]);
       return redirect('/')->with('message', 'Keyboard created successfully!');
        
    }
    //Show Edit Form
    public function edit(Keyboard $keyboard){
        return view('keyboards.edit', ['keyboard' => $keyboard]);
    }
    
    //Edit Keyboard Submit to Update
    public function update(Request $request, Keyboard $keyboard){
        //Loged in user is owner
        if($keyboard->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $user_id = auth()->id();
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
            
            $filename = $keyboard->image;
            
        }
        Keyboard::where('id', $keyboard->id)->update([ 
            'title' => $formFields['title'],
            'description' => $formFields['description'],
            'price' => $formFields['price'],
            'switches' => $formFields['switches'],
            'details' => $formFields['details'],
            'image' => $filename,
            'user_id' => auth()->id(),
        ]);
       return redirect('/')->with('message', 'Keyboard updated successfully!');
       
}   //Show Login Form
    public function login(){
        return view('users.login');
    }
    


    //Delete Keyboard
    public function destroy(Keyboard $keyboard){
        $keyboard->delete();
        return redirect('/')->with('message', 'Keyboard deleted successfully!');
    }


    //Manage Keyboards
    public function manage(){
        return view('keyboards.manage', ['keyboards' => auth()->user()->keyboards()->get()]);
    }   

}
