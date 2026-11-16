<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{ 
    /** 
     * Show the registration form. 
     */ 
    public function create(): View 
    { 
        return view('auth.register'); 
    } 

    public function store(RegisterRequest $request): RedirectResponse 
    { 
        $user = User::create([ 
            ...$request->safe()->only(['name', 'email', 'password']), 
            'role' => UserRole::User, 
        ]); 
  
        Auth::login($user); 
  
        $request->session()->regenerate(); 
     return redirect()->route('dashboard')->with('success', 
    'Registrasi berhasil. Selamat datang!'); 
    } 
} 

