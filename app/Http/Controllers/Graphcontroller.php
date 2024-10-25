<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Graphcontroller extends Controller
{
    public function graph()
    {
        $try = DB::select("SELECT DATE_FORMAT(sales.created_at, '%M') month, tickets.ticket_name, SUM(tickets.price) price 
        FROM sales 
        JOIN tickets on sales.ticket_id = tickets.id 
        WHERE tickets.id = 2 
        GROUP BY DATE_FORMAT(sales.created_at, '%M'), tickets.ticket_name");

        $new = json_encode($try);

        $try2 = DB::select("SELECT DATE_FORMAT(sales.created_at, '%M') month, tickets.ticket_name, SUM(tickets.price) price 
        FROM sales 
        JOIN tickets on sales.ticket_id = tickets.id 
        WHERE tickets.id = 1 
        GROUP BY DATE_FORMAT(sales.created_at, '%M'), tickets.ticket_name");


        $new2 = json_encode($try2);



        // $try = DB::select('SELECT sales.created_at, tickets.ticket_name, SUM(tickets.price) price 
        // FROM sales JOIN tickets on sales.ticket_id = tickets.id 
        // WHERE tickets.id = 2 
        // GROUP BY sales.created_at, tickets.ticket_name');

        // $new = json_encode($try);

        // $try2 = DB::select('SELECT sales.created_at, tickets.ticket_name, SUM(tickets.price) price 
        // FROM sales JOIN tickets on sales.ticket_id = tickets.id 
        // WHERE tickets.id = 1 
        // GROUP BY sales.created_at, tickets.ticket_name');

        // $new2 = json_encode($try2);


        // dd($try);
        // die();
        // $try = Sales::select('sales.created_at', 'tickets.ticket_name', 'tickets.price')
        // ->join('tickets','sales.ticket_id', '=', 'tickets.id')
        // ->groupBy('sales.created_at', 'tickets.ticket_name', 'tickets.price')
        // ->where('tickets.id', '=', '1')
        // ->get();

        // SELECT sales.created_at, tickets.ticket_name, SUM(tickets.price) price 
        // FROM sales 
        // JOIN tickets on sales.ticket_id = tickets.id 
        // WHERE tickets.id = 1 
        // GROUP BY sales.created_at, tickets.ticket_name;


        // $try = Sales::select('sales.created_at', 'sales.customer_quantity', 'tickets.ticket_name', 'tickets.price', 'sales.reference_num')
        //     ->join('tickets', 'sales.ticket_id', '=', 'tickets.id')
        //     ->groupBy('sales.created_at', 'sales.customer_quantity', 'tickets.ticket_name', 'tickets.price', 'sales.reference_num')
        //     ->get();

        // $getBySales = Sales::join('tickets', 'sales.ticket_id', '=', 'tickets.id')->select('sales.*', 'tickets.price')->get();

        // $salesByDate = [];
        // $totalPrice = 0;
        // foreach ($getBySales as $sales) {
        //     $salesByDate[] = $sales;
        //     $dateSale = date('Y-m-d H:i:s', strtotime($sales['created_at']));
        //     $dateNow = date('Y-m-d H:i:s', strtotime(NOW()));
        //     if ($dateSale < $dateNow) {
        //         $salesByDate['salesByDay'] = $sales;
        //         $totalPrice += intval($sales['customer_quantity']) * intval($sales['price']);
        //     }
        // }

        // dd($salesByDate);
        // die();
        // "SELECT sales.created_at, tickets.ticket_name, SUM(tickets.price) price\n"

        // . "FROM sales JOIN tickets on sales.ticket_id = tickets.id\n"

        // . "GROUP BY sales.created_at, tickets.ticket_name;";

        // $sales=Sales::all();
        // return view('auth.graph', compact('sales'));

        // $sales = DB::table('sales')
        // ->select('created_at')
        // ->get();
        // return view('auth.graph', compact('sales'));

        $sales = Sales::all();
        // $dat = Sales::select(Carbon::parse('sales.created_at')->format('F j, Y'))->get();
        // ;

        $ticketss = Ticket::all();
        $lists = Sales::join('tickets', 'sales.ticket_id', '=', 'tickets.id')
            ->orderBy('sales.created_at', 'desc')
            ->select('sales.*', 'tickets.ticket_name', 'tickets.price')
            ->get();


        return view('auth.dashboard', compact('lists', 'ticketss', 'sales', 'try', 'new', 'try2', 'new2'));
    }
}