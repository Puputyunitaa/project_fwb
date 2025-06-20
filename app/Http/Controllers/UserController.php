<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController
{
    function adminDashboard()
    {
        return view('users.dashboard');
    }

    function supervisorDashboard()
    {
        return view('users.dashboard');
    }

    function stafDashboard()
    {
        return view('users.dashboard');
    }
}
