<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Userr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin_signup(){
        return view('dentist_system.admin_signup_page');
    }
    public function signup_store( Request $request){
            $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        // Create User
        Userr::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password), // ✅ hashed
        ]);

        return redirect()->route('signup.form')->with('success', 'Account created successfully!');
    }


    
    public function showLoginForm()
    {
        return view('dentist_system.admin_login_page');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
//dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');}
            else{

        return back()->withErrors(['message' => 'Invalid credentials']);
    }
}

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}

