<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function sales()
    {
        if (Auth::check()) {
            $tickets = Ticket::all();
            $list = Sales::orderBy('created_at', 'desc')->paginate(15); // Change the number '10' to the desired number of items per page
            return view('auth.sales', compact('list', 'tickets'));
        }
        return redirect("login-page")->withSuccess('You are not allowed to access');
    }

    public function tickets()
    {
        if (Auth::check()) {
            $list = Ticket::all();
            return view('auth.tickets', compact('list'));
        }
        return redirect("login-page")->withSuccess('You are not allowed to access');
    }
}
