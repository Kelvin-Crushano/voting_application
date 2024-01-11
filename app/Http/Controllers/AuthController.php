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

    public function login()
    {
        return view('login.login');
    }
}
