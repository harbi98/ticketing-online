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
                'ticket_name' => 'Ticket 1',
                'ticket_type' => 'Standard',
                'price' => 150.00
            ],
            [
                'ticket_name' => 'Ticket 2',
                'ticket_type' => 'Standard',
                'price' => 160.00
            ]
        ];

        foreach ($tickets as $value) {
            Ticket::create($value);
        }
        
    }
}
