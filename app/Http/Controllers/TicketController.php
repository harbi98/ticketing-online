<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function sales()
    {
        if (Auth::check()) {
            return view('auth.sales');
        }
        return redirect("login-page")->withSuccess('You are not allowed to access');
    }
    public function tickets()
    {
        if (Auth::check()) {
            return view('auth.tickets');
        }
        return redirect("login-page")->withSuccess('You are not allowed to access');
    }
}
