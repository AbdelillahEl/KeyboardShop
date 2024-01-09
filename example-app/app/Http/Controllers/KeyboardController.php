<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    public function index(){
        return view('keyboards.index', [
            
            'keyboards' => Keyboard::all()]
    );
    }

    public function show(Keyboard $keyboard){
        
    return view('keyboards.show', ['keyboard' => $keyboard]);
    }
}
