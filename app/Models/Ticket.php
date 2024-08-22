<?php

namespace App\Models;

use App\Models\Sales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_name',
        'ticket_type',
        'price'
    ];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'id'); // Adjust 'ticket_id' to your foreign key
    }
}
