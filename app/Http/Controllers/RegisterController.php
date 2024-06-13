<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data input
        $request ->validate([
            'username' => 'required|string|max:255|',
            'password' => 'required|string|min:4|',
            'email' => 'required|string|email|max:255|',
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($admin) {
            return redirect('login')->with('success', 'Pendaftaran berhasil, silahkan login.');
        } 
        else {
            return redirect('register')->with('error', 'Pendaftaran gagal, silahkan coba lagi.');
        }
    }
    public function showRegistrationForm()
    {
        return view('Auth.register');
    }
}
