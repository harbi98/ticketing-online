<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Mail\TicketSale;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class PublicController extends Controller
{
    public function homepage(){
        return view('auth.landing');
    }
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
            'status' => 0
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
        // return redirect("thank-you")->withSuccess('Thank you for buying a ticket.');
        return redirect("thank-you")->withSuccess('Thank you for buying a ticket.');
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
            'status' => 0
        ]);

        $total_price = round($ticket->price) . '00';
        // $items = [
        //     'customer_name' => $request->customer_name,
        //     'customer_email' => $request->customer_email,
        //     'customer_contact' => $request->customer_contact,
        //     'ticket_price' => $total_price,
        //     'ticket_name' => $ticket->ticket_name
        // ];

        // return view('public.confirm-ticket', compact('sale', 'ticket'));

        $encryptedSale = Crypt::encryptString($sale);
        $encryptedTicket = Crypt::encryptString($ticket);

        $client = new Client();
        $body = [
            "data" => [
                "attributes" => [
                    "billing" => [
                        "name" => $request->customer_name,
                        "email" => $request->customer_email,
                        "phone" => $request->customer_contact,
                    ],
                    "send_email_receipt" => true,
                    "show_description" => true,
                    "show_line_items" => true,
                    "description" => 'Ticket Items',
                    "payment_method_types" => ["gcash","grab_pay","paymaya","card","brankas_landbank","brankas_bdo","brankas_metrobank"],
                    "line_items" => [
                        [
                            "currency" => "PHP",
                            "amount" => intval($total_price),
                            "description" => 'Ticket Item',
                            "name" => $ticket->ticket_name,
                            "quantity" => 1
                        ]
                    ],
                    "success_url" => url('purchase-confirmation?sale=' . $encryptedSale . '&ticket=' . $encryptedTicket)
                ]
            ]
        ];

        try {
            $response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
                'body' => json_encode($body),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode('sk_test_JktT2eXzzLLo43HuhqErP7Vj' . ':'),
                ],
            ]);
            $responseBody = json_decode($response->getBody(), true);
            
            // print_r($responseBody['data']);
            return redirect($responseBody['data']['attributes']['checkout_url']);
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to create checkout session. Please try again.');
        }
    }
    
    public function purchaseConfirm(Request $request){
        $sale = Crypt::decryptString($request->query('sale'));
        $ticket = Crypt::decryptString($request->query('ticket'));
        $sales = json_decode($sale, true);
        $tickets = json_decode($ticket, true);

        // print_r($sales);
        return view('public.confirm-ticket', compact('sales', 'tickets'));
    }
    public function scanTicket($ticket_number){
        if ($ticket_number) {
           $scan_ticket = Sales::where('ticket_num', $ticket_number)->first();

           if($scan_ticket->status == 1){
                return response(['message' => 'Ticket has already scanned'], 200);
           }

           $scan_ticket->status = 1;
           $scan_ticket->save();
           return response(['message' => 'Ticket Scanned'], 200);

        }else{
            return response(['message' => 'No Ticket Number Found'], 404);
        }
    }
    
}
