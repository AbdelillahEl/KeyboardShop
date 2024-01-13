<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
class UserController extends Controller
{
    //Show Registration Form
    public function create()
    {
        return view('users.register');
    }

    //Create New User
    public function store(Request $request)
    {
       $formfield= $request->validate([
            'name' => ['required','min:3' ,'max:27'],
            'email' => ['email', 'required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        $formfields['password']=bcrypt($formfield['password']);
       
        $user=User::create([
            'name' => $formfield['name'],
            'email' => $formfield['email'],
            'password' => $formfields['password']


        ]
        );
        
        
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
}

    //Logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
}

    //Show Login Form
    public function login()
    {
        return view('users.login');
    }
    //Login
    public function authenticate(Request $request)
    {
        $formfield= $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($formfield)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}

