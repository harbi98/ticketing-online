<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Mail\TicketSale;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Throwable;

class PublicController extends Controller
{
    public function homepage()
    {
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
        $sales = [];
        $ticket = Ticket::find($request->ticket_id);
        // $reference_num = 'TBR-GH-PTNM-' . rand(10000, 99999) . '-' . $nextId;

        for ($i = 1; $i <= $request->customer_quantity; $i++) {
            $ticket_number = 'TBR-GH-PTNM-' . $nextId . '-' . $currentDate . '-' . $i;
            $sale = Sales::create([
                'ticket_num' => $ticket_number,
                'ticket_id' => $request->ticket_id,
                'reference_num' => $request->reference_num,
                'customer_name' => $request->customer_name,
                'customer_quantity' => 1,
                'customer_email' => $request->customer_email,
                'customer_contact' => $request->customer_contact,
                'status' => 0
            ]);

            $qrcode = QrCode::size(250)->generate($ticket_number);
            $sales[] = [
                'ticket_num' => $ticket_number,
                'ticket_name' => $ticket->ticket_name,
                'ticket_type' => $ticket->ticket_type,
                'ticket_price' => $ticket->price,
                'reference_num' => $request->reference_num,
                'qrcode' => $qrcode,
                'sales_date' => $sale->created_at,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'ticket_quantity' => 1
            ];
        }

        $pdf_size = array(0, 0, 349, 573);
        $mail = new TicketSale($sale);
        $pdf = PDF::loadView('mail.ticket', compact('ticket', 'sales'))->setPaper($pdf_size);
        Mail::to($request->customer_email)->send($mail->attachData($pdf->output(), 'tickets.pdf'));

        // $mail = new TicketSale($sale);
        // $pdf_size = array(0, 0, 349, 573);
        // $qrcode = QrCode::size(250)->generate($sale->ticket_num);
        // $pdf = PDF::loadView('mail.ticket', compact('ticket', 'sale', 'qrcode'))->setPaper($pdf_size);
        // $mail->attachData($pdf->output(), $sale->ticket_num . '.pdf');
        // Mail::to($request->customer_email)->send($mail);

        if (Auth::check()) {
            return redirect("sales")->withSuccess('Thank you for buying a ticket.');
        }
        // return redirect("thank-you")->withSuccess('Thank you for buying a ticket.');
        // return redirect()->route("index.thank.you.page")->with(['sales' => $sales]);
        $saledb = json_encode($sales);
        return view('public.thank-you-page', compact('ticket', 'saledb'));
        // return view('public.thank-you-page', compact('sales', 'ticket'));

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
        $ticket = Ticket::select(['id', 'ticket_name', 'price', 'ticket_type'])->where('id', '=', $request->ticketSelect)->first();
        $reference_num = 'TBR-GH-PTNM-' . rand(10000, 99999) . '-' . $nextId;
        $sales = [];
        for ($i = 1; $i <= $request->customer_quantity; $i++) {
            $ticket_number = 'TBR-GH-PTNM-' . $nextId . '-' . $currentDate . '-' . $i;
            $sale = Sales::make([
                'ticket_num' => $ticket_number,
                'ticket_id' => $request->ticketSelect,
                'reference_num' => $reference_num,
                'customer_name' => $request->customer_name,
                'customer_quantity' => $request->customer_quantity,
                'customer_email' => $request->customer_email,
                'customer_contact' => $request->customer_contact,
                'status' => 0
            ]);

            $sales[] = [
                'reference_num' => $reference_num,
                'sale_quantity' => 1,
                'ticket_num' => $ticket_number,
                'ticket_name' => $ticket->ticket_name,
                'ticket_type' => $ticket->ticket_type,
                'ticket_price' => $ticket->price,
                'ticket_id' => $request->ticketSelect,
                'customer_name' => $request->customer_name,
                'customer_quantity' => $request->customer_quantity,
                'customer_email' => $request->customer_email,
                'customer_contact' => $request->customer_contact,
                'status' => 0
            ];
        }

        $salesJson = json_encode($sales);

        $price_ticket = round($ticket->price);
        // $total_price = intval($tprice) * intval($sale->customer_quantity);
        $final_price = strval($price_ticket) . '00';

        $encryptedSale = Crypt::encryptString($salesJson);
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
                    "payment_method_types" => ["gcash", "grab_pay", "paymaya", "card", "brankas_landbank", "brankas_bdo", "brankas_metrobank"],
                    "reference_number" => $reference_num,
                    "line_items" => [
                        [
                            "currency" => "PHP",
                            "amount" => intval($final_price),
                            "description" => 'Ticket Item',
                            "name" => $ticket->ticket_name,
                            "quantity" => intval($request->customer_quantity)
                        ]
                    ],
                    "success_url" => url('purchase-confirmation?sale=' . $encryptedSale . '&ticket=' . $encryptedTicket)
                ]
            ]
        ];

        $secretKey = env('PAYMONGO_SECRET_KEY');
        try {
            $response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
                'body' => json_encode($body),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode($secretKey . ':'),
                ],
            ]);
            $responseBody = json_decode($response->getBody(), true);

            // print_r($responseBody['data']);
            return redirect($responseBody['data']['attributes']['checkout_url']);
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to create checkout session. Please try again.');
        }
    }

    public function adminConfirmTicket(Request $request)
    {
        $latest_id = Sales::max('id');
        if (is_null($latest_id)) {
            $nextId = 1;
        } else {
            $nextId = $latest_id + 1;
        }
        $currentDate = date('y-m-d');

        $tickets = Ticket::select(['id', 'ticket_name', 'price'])->where('id', '=', $request->ticketSelect)->first();
        $reference_num = 'TBR-GH-PTNM-' . rand(10000, 99999) . '-' . $nextId;
        for ($i = 1; $i <= $request->customer_quantity; $i++) {
            $ticket_number = 'TBR-GH-PTNM-' . $nextId . '-' . $currentDate . '-' . $i;
            $sale = Sales::create([
                'ticket_num' => $ticket_number,
                'ticket_id' => $request->ticketSelect,
                'reference_num' => $reference_num,
                'customer_name' => $request->customer_name,
                'customer_quantity' => 1,
                'customer_email' => $request->customer_email,
                'customer_contact' => $request->customer_contact,
                'status' => 0
            ]);

            $qrcode = QrCode::size(250)->generate($ticket_number);
            $sales[] = [
                'ticket_num' => $ticket_number,
                'ticket_name' => $tickets->ticket_name,
                'ticket_type' => $tickets->ticket_type,
                'ticket_price' => $tickets->price,
                'qrcode' => $qrcode,
                'sales_date' => $sale->created_at,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'ticket_quantity' => 1
            ];
        }

        $pdf_size = array(0, 0, 349, 573);
        $mail = new TicketSale($sale);
        $pdf = PDF::loadView('mail.ticket', compact('tickets', 'sales'))->setPaper($pdf_size);
        try {
            Mail::to($request->customer_email)->send($mail->attachData($pdf->output(), 'tickets.pdf'));
            return back()->with('status', 'Ticket Purchase Successful');
        } catch (Throwable $e) {
            return back()->with('status', 'Unable to send email. Please try again.');
        }

        // echo Sales::all();
        // return view('public.confirm-ticket', compact('sales', 'tickets'));
    }

    public function purchaseConfirm(Request $request)
    {
        $sale = Crypt::decryptString($request->query('sale'));
        $ticket = Crypt::decryptString($request->query('ticket'));
        $sales = json_decode($sale, true);
        $tickets = json_decode($ticket, true);

        $saledb = json_encode($sales);
        $ticketdb = json_encode($tickets);

        return view('public.confirm-ticket', compact('sales', 'tickets'));
        // return view('public.confirm-ticket', ['sales'=> $sales, 'tickets' => $tickets]);
    }
    public function scanTicket($ticket_number)
    {
        if ($ticket_number) {
            $scan_ticket = Sales::where('ticket_num', $ticket_number)->first();

            if ($scan_ticket->status == 1) {
                return response(['message' => 'Ticket has already scanned'], 200);
            }

            $scan_ticket->status = 1;
            $scan_ticket->save();
            return response(['message' => 'Ticket Scanned'], 200);

        } else {
            return response(['message' => 'No Ticket Number Found'], 404);
        }
    }
}
