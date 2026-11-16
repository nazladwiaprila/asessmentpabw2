<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
     public function create(): View 
    { 
        return view('auth.login'); 
    } 
  
    /** 
     * Authenticate the user. 
     */
     public function store(LoginRequest $request): RedirectResponse 
    { 
        $throttleKey = Str::transliterate(Str::lower($request
        >string('email')).'|'.$request->ip()); 

         if (RateLimiter::tooManyAttempts($throttleKey, 5)) { 
            throw ValidationException::withMessages([ 
                'email' => 'Terlalu banyak percobaan login. Coba lagi 
                dalam '.RateLimiter::availableIn($throttleKey).' detik.', 
            ]); 
        }
        if (! Auth::attempt($request->validated(), $request
        >boolean('remember'))) { 
            RateLimiter::hit($throttleKey); 
  
            throw ValidationException::withMessages([ 
                'email' => 'Email atau password salah.', 
            ]); 
        }  
        RateLimiter::clear($throttleKey); 
  
        $request->session()->regenerate(); 
  
        return redirect()->intended(route('dashboard')); 
    } 
    /** 
     * Log the user out. 
     */ 
    public function destroy(Request $request): RedirectResponse 
    { 
        Auth::logout(); 
    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 
    return redirect()->route('login'); 
}
}
