<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        if (auth()->user()) {

            // if user role admin ok
            // if user role user redirect to home
            if (auth()->user()->hasRole('admin')) {
                return view('admin.dashboard')->with('status', 'ACCESS GRANTED 200 | You Are a admin');
            } else {
                return redirect('/home')->with('status', 'ACCESS DENIED 403 | You Are not a admin ');
            }
        } else {
            return redirect()->route('login')->with('status', 'ACCESS DENIED 403 | You Are not a admin, user');
        }
    }
}
