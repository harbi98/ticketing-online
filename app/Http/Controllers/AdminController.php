<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function createTicket(Request $request)
    {
        Ticket::create([
            'ticket_name' => $request->ticket_name,
            'ticket_type' => $request->ticket_type,
            'price' => $request->price
        ]);
        return Redirect::to('tickets')->with('succes_message', 'New Ticket Added Successfully');
    }
}
