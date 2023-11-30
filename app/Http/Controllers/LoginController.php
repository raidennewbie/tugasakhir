<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    //view login
    public function index()
    {
        return view('login');
    }

    //validasi
    public function authenticate(Request $request, User $user)
    {
       $credentials = $request->validate([
            'email' => 'required|email:dns',
            "password" => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user();

            if($user->role == 'admin')
            {
                return redirect('admin/beranda');
            } 
            elseif ($user->role == 'guru') 
            {
                return redirect('guru/beranda');
            } 
            else 
            {
                return redirect('login');
            }
        }
        return back()->with('loginError','Login gagal');
    }

    //logout
    public function logout(Request $request) 
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

}
