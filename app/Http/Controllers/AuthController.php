<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            session([
                'user' => [
                    'id' => $user->id_user,
                    'username' => $user->username,
                    'role' => $user->role,
                    'email' => $user->email
                    
                ],
            ]);

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        // Jika gagal
        return response()->json([
            'status' => 'error',
            'message' => 'Email atau password salah',
        ], 401);
    }

    /**
     * Handle logout request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        session()->forget('user');

        Auth::logout();

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Logout berhasil',
        // ]);

        return redirect('/')->with('status', 'Logout berhasil.');
    }
}
