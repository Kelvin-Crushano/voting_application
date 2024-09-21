<?php

namespace App\Http\Controllers;

use App\Models\gs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'email';
    }

    public function gs_dashboard()
    {
        return view('gsDashboard.gsdashboard');
    }
    public function admin_dashboard()
    {
        return view('adminDashboard.admin_dashboard');
    }

    public function commissioner_dashboard()
    {
        return view('commissionerDashboard.commissioner_dashboard');
    }
    public function admin_login()
    {
        return view('authentication.admin_auth.login.login');
    }
    public function gs_login()
    {
        return view('authentication.gs_auth.login.login');
    }
    public function voter_login()
    {
        return view('authentication.voter_auth.login.login');
    }
    public function admin_register()
    {
        return view('authentication.admin_auth.register.register');
    }

    public function gs_login_system(Request $request)
    {
        $formtype = $request->form_type;
        $credentials = $request->only('email', 'password');

        if (Auth::guard('gs_users')->attempt($credentials)) {
            session(['gs' => $formtype]);
            // Authentication passed, redirect to the desired location
            return redirect('/gs_dashboard')->with('success','Loginned');
        }

        // Authentication failed, return back with an error message
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function gs_logout()
    {
        session()->forget('gs');
        auth()->guard('gs_users')->logout();
        return redirect('/');
    }

    public function admin_login_system(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $formtype = $request->form_type;

        if (Auth::guard('admin')->attempt($credentials)) {

            session(['admin' => $formtype]);
            // Authentication passed, redirect to the desired location
            return redirect('/admin_dashboard')->with('success','Loginned');
        }

        // Authentication failed, return back with an error message
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function admin_logout()
    {
        session()->forget('admin');
        auth()->guard('admin')->logout();
        return redirect('/');
    }

}
