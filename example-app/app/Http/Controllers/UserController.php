<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Password;
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
    public function reset()
    {
        return view('users.reset');
    }

    //Show Edit Page
    public function edit(User $user)
    {
        return view('users.profile-edit', [
            'user' => $user
        ]);
    }

    //Update Profile
    public function update(Request $request, User $user)
{
    // Validate the input fields
    $formFields = $request->validate([
        'name' => ['required', 'min:3', 'max:27'],
        'email' => ['email', 'required', Rule::unique('users', 'email')->ignore($user->id)],
        'password' => 'nullable|min:6|confirmed', // Validate password and confirmation
        'profilepicture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        'bio' => 'nullable',
        'birthdate' => 'nullable',
    ]);

    // Handle profile picture upload
    if ($request->hasFile('profilepicture')) {
        $profilepicture = $request->file('profilepicture');
        $extension = $profilepicture->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $profilepicture->move(public_path('images'), $filename);
    } else {
        // Use existing profile picture if no new one is uploaded
        $filename = $user->profilepicture;
    }

    // Update the user
    $user->name = $formFields['name'];
    $user->email = $formFields['email'];
    $user->bio = $formFields['bio'] ?? $user->bio;
    $user->birthdate = $formFields['birthdate'] ?? $user->birthdate;
    $user->profilepicture = $filename;

    // Update password if provided
    if ($request->filled('password')) {
        $user->password = bcrypt($formFields['password']);
    }

    $user->save(); // Save changes to the database

    return redirect('/')->with('message', 'Profile updated successfully!');
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
    public function addAdmin(Request $request)
{
    // Validate the email input
    $formFields = $request->validate([
        'email' => ['email', 'required', 'exists:users,email'],
    ]);

    // Find the user by email
    User::where('email', $formFields['email'])->update([
            'role' => 'admin',  
        ]);

        return redirect('/')->with('message', 'User has been made an admin successfully!');
   
}
public function resetPassword(Request $request)
{
    // Validate the email input
    $formFields = $request->validate([
        'email' => ['email', 'required', 'exists:users,email'],
    ]);
    $status = Password::sendResetLink(
        $formFields
    ); // Send password reset link
    return $status === Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withErrors(['email' => __($status)]); // Send error message if reset link could not be sent
}


    
}

