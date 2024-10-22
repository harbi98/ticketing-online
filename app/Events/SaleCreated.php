<?php

namespace App\Events;

use App\Models\Sales;
use App\Models\Ticket;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SaleCreated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $sale;

    public function __construct(Sales $sale)
    {
        $this->sale = $sale;
    }

    public function broadcastOn()
    {
        return new Channel('sales');
    }

    public function broadcastWith()
    {
        return [
            'reference_num' => $this->sale->reference_num,
            'customer_quantity' => $this->sale->customer_quantity,
            'customer_name' => $this->sale->customer_name,
            'customer_email' => $this->sale->customer_email,
            'customer_contact' => $this->sale->customer_contact,
            'ticket_id' => $this->sale->ticket_id,
            'total_price' => $this->calculateTotalPrice($this->sale->ticket_id, $this->sale->customer_quantity),
        ];
    }

    protected function calculateTotalPrice($ticketId, $quantity)
    {
        // Fetch the ticket price from the tickets table based on ticket_id
        $ticketPrice = Ticket::where('id', $ticketId)->value('price');

        // Calculate total price based on the quantity
        return $ticketPrice !== null ? $ticketPrice * $quantity : 0;
    }
}