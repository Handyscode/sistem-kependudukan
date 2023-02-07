<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function auth(Request $request){
        $creds = $request->validate([
            'nik' => 'required|max:16',
            'password' => 'required'
        ]);

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }else{
            return redirect()->back()->with('error', 'NIK / Password Salah');
        }
    }

    public function register(Request $request){
        $validated = $request->validate([
            'nik' => 'required|max:16',
            'fullname' => 'required',
            'password' => 'required'
        ]);

        $lastUserID = DB::table('users')->select('id_user')->orderBy('id_user', 'desc')->first();
        if ($lastUserID == null) {
            $userID = "USR001";
        } else {
            $lastIncrement = substr($lastUserID->id_user, -3);
            $userID = "USR" . str_pad($lastIncrement + 1, 3, 0, STR_PAD_LEFT);
        }

        
        $validated['id_user'] = $userID;
        $validated['password'] = Hash::make($validated['password']);
        $validated['name'] = $validated['fullname'];

        $query = User::create($validated);

        if ($query) {
            return redirect('/')->with('success', 'Berhasil Mendaftar');
        }else{
            return redirect('/')->with('error', 'Gagal Mendaftar');
        }
        
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
