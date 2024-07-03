<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PublicController extends Controller
{
    public function index(){
        $tickets = Ticket::all();
        return view('public.form', compact('tickets'));
    }

    public function thankYouPage(){
        return view('public.thank-you-page');
    }

    public function purchaseTicket(Request $request){
        
        $latest_id = Sales::max('id');
        if (is_null($latest_id)) {
            $nextId = 1;
        } else {
            $nextId = $latest_id + 1;
        }
        $currentDate = date('y-m-d');
        $ticket_number = 'TBR-GH-PTNM-'.$nextId.'-'.$currentDate;
        Sales::create([
            'ticket_num' => $ticket_number,
            'ticket_id' => $request->ticketSelect,
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_email' => $request->customer_email,
            'customer_contact' => $request->customer_contact,
        ]);

        
        return redirect("thank-you")->withSuccess('Thank you for buying a ticket.');
    }
}
