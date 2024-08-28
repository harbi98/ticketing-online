<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = [
            [
                'ticket_name' => 'Gen Ad',
                'ticket_type' => 'Gen Ad',
                'price' => 1300.00
            ],
            [
                'ticket_name' => 'VIP',
                'ticket_type' => 'VIP',
                'price' => 2100.00
            ],
            // [
            //     'ticket_name' => 'VVIP',
            //     'ticket_type' => 'VVIP',
            //     'price' => 2600.00
            // ]
        ];

        foreach ($tickets as $value) {
            Ticket::create($value);
        }
        
    }
}
