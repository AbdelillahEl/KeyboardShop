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
    //Show Profile Page
    public function profile(User $user)
    {
        return view('users.profile', [
            'user' => $user
        ]);
    }

    //Show Edit Page
    public function edit(User $user)
    {
        return view('users.profile-edit', [
            'user' => $user
        ]);
    }

    //Update Profile
    public function update(User $user, Request $request)
    {
        $formFields= $request->validate([
            'name' => ['required','min:3' ,'max:27'],
            'email' => ['email', 'required', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'required|min:6',
            'profilepicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'bio' => 'nullable',
            'birthdate' => 'nullable',
        ]);

        if($request->hasFile('profilepicture')){
            $profilepicture = $request->file('profilepicture');
            $extension = $profilepicture->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $profilepicture->move(public_path('images'), $filename);
        } else {
            
            $filename = $user->profilepicture;
            
        
        $formFields['password']=bcrypt($formFields['password']);

        User::where('id', $user	->id)->update([ 
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'bio' => $formFields['bio'],
            'birthdate' => $formFields['birthdate'],
            'profilepicture' => $filename,
            
        ]);
       return redirect('/')->with('message', 'Profile updated successfully!');
    }
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
            'password' => $formfields['password'],
            'bio' =>'About me' ,
            'birthdate' => now('Europe/London')->format('Y-m-d H:i:s'),
            'image' =>"no-image.png",


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

