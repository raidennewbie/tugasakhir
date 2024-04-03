<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Util\Str;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    //view login
    public function index()
    {
        return view('login');
    }

    public function lupasandi()
    {
        return view('lupasandi');
    }

    public function atursandi(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $request->session()->put('reset_email', $request->email);
        return redirect()->route('barusandi'); 
    }

    public function barusandi()
    {
        return view('atursandi');
    }

    public function buatsandi(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $email = $request->session()->get('reset_email');
    
        // Hapus email dari session
        $request->session()->forget('reset_email');
    
        // Temukan pengguna berdasarkan email
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Email tidak ditemukan.');
        }
        
        // Simpan password baru
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success', 'Password baru telah dibuat.');
    }

    //     $request->session()->put('reset_email', $request->email);
    //    return redirect('/password');
        // $newPassword = ('akhsancoc');

        
        // $user = User::where('email', $request->email)->first();
        // $user->password = Hash::make($newPassword);
        // $user->save();


   
        // ->with('success', 'Password baru telah dibuat dan dikirimkan ke email Anda.');
  
        // return view('atursandi');
    



       

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
