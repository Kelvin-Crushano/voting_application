<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
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
    public function admin_register()
    {
        return view('authentication.admin_auth.register.register');
    }

}
