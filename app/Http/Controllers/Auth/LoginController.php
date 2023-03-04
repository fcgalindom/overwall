<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        $perfiles = Perfil::all(); 
        return view('login' , compact('perfiles'));
    }
    
    public function login(Request $request)
    {
        
        
        
        $credentials = $request->only('usuario_login', 'password','id_perfil');

        if (Auth::attempt($credentials)) {
            return response()->json([
                'user' => Auth::user()
            ], 200);
        }
        
    
        else {
            return response()->json([
                'message' => 'Crendeciales incorrectas'
            ], 422);
        }
        
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    public function usuarioLogeado(){
        $user = Auth::user();
        
        return view('usuario' , compact('user'));
    }
   
    
}
