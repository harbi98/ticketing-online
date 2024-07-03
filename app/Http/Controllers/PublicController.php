<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Mail\TicketSale;

use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('public.form', compact('tickets'));
    }

    public function thankYouPage()
    {
        return view('public.thank-you-page');
    }

    public function purchaseTicket(Request $request)
    {

        $latest_id = Sales::max('id');
        if (is_null($latest_id)) {
            $nextId = 1;
        } else {
            $nextId = $latest_id + 1;
        }
        $currentDate = date('y-m-d');
        $ticket_number = 'TBR-GH-PTNM-' . $nextId . '-' . $currentDate;

        $ticket = Ticket::find($request->ticket_id);
        $sale =  Sales::create([
            'ticket_num' => $ticket_number,
            'ticket_id' => $request->ticket_id,
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_email' => $request->customer_email,
            'customer_contact' => $request->customer_contact,
        ]);

        // ...

        $mail = new TicketSale($sale);

        $pdf_size = array(0, 0, 349, 573);

        $qrcode = QrCode::size(250)->generate($sale->ticket_num);
        $pdf = PDF::loadView('mail.ticket', compact('ticket', 'sale', 'qrcode'))->setPaper($pdf_size);

        $mail->attachData($pdf->output(), $sale->ticket_num . '.pdf');

        Mail::to($request->customer_email)->send($mail);

        if (Auth::check()) {
            return redirect("sales")->withSuccess('Thank you for buying a ticket.');
        }
        return redirect("thank-you")->withSuccess('Thank you for buying a ticket.');
        //return redirect("thank-you")->withSuccess('Thank you for buying a ticket.');
    }


    public function confirmTicket(Request $request)
    {
        $latest_id = Sales::max('id');
        if (is_null($latest_id)) {
            $nextId = 1;
        } else {
            $nextId = $latest_id + 1;
        }
        $currentDate = date('y-m-d');
        $ticket_number = 'TBR-GH-PTNM-' . $nextId . '-' . $currentDate;
        $ticket = Ticket::select(['id', 'ticket_name', 'price'])->where('id', '=', $request->ticketSelect)->first();



        $sale = Sales::make([
            'ticket_num' => $ticket_number,
            'ticket_id' => $request->ticketSelect,
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_email' => $request->customer_email,
            'customer_contact' => $request->customer_contact,
        ]);
        return view('public.confirm-ticket', compact('sale', 'ticket'));
    }
}
