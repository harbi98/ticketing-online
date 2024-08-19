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

    public function viewTicket(Request $request){
        $tickets = Ticket::find($request->ticket_id);
        return json_encode($tickets);
        // return view('admin.view-ticket', compact('tickets'));
    }

    public function editTicket(Request $request){
        $tickets = Ticket::find($request->ticket_id);
        Ticket::where('id', $request->ticket_id)->update([
           'ticket_name' => $request->ticket_name,
           'ticket_type' => $request->ticket_type,
           'price' => $request->price,
           'updated_at' => date('Y-m-d H:i:s')
        ]);
        return Redirect::to('tickets')->with('succes_message', 'Ticket Updated Successfully');
        // return json_encode($tickets);
    }

    public function deleteTicket(Request $request){
        $tickets = Ticket::find($request->ticket_id);
        if($tickets->delete()){
            echo "success";
        }else{
            echo "failed";
        }
    
    }
}
