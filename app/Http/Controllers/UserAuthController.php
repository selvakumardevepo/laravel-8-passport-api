<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{

    public function adminDashboard()
    {
        // Only allow admin to view
        if (Auth::check() && Auth::user()->role === 'admin') {
            $allusers = User::all(); // fetch all users
            $allproducts = Product::with('creator')->get();
            return view('dashboard_admin', compact('allusers', 'allproducts'));
        }

        return redirect()->route('login')->with('error', 'Unauthorized access');
    }



    public function redirect()
    {
        //Get the authenticated user
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        //Check role and redirect accordingly
        if ($user->role === 'admin') {
            return redirect()->route('dashboard-admin')
                ->with('success', 'Login successful as Admin')
                ->with('user', $user);
        } elseif ($user->role === 'customer') {
            return redirect()->route('dashboard-user')
                ->with('success', 'Login successful');
        } else {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized access');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Email address not registered');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->with('error', 'Password is incorrect');
        }

        Auth::login($user);
        $token = $user->createToken('API Token')->accessToken;
        $request->session()->regenerate();

        session([
            'token' => $token
        ]);

        if ($user->role === 'admin') {
            return redirect()->route('dashboard-admin')
                ->with('success', 'Login successful as Admin')
                ->with('user', $user);
        } elseif ($user->role === 'customer') {
            return redirect()->route('dashboard-user')
                ->with('success', 'Login successful');
        } else {
            return redirect()->route('login')
                ->with('error', 'Something went wrong');
        }
    }


    public function logout(Request $request)
    {
        // Revoke all tokens (if you're using Passport API)
        auth()->user()->tokens()->delete();

        // Logout from web guard
        auth()->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout successful');
    }
}
