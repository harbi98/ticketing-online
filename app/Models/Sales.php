<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_num',
        'ticket_id',
        'reference_num',
        'customer_name',
        'customer_quantity',
        'customer_email',
        'customer_contact',
        'status'
    ];
    
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id'); // Adjust 'ticket_id' to your foreign key
    }
}
