<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_num',
        'ticket_id',
        'customer_name',
        'customer_address',
        'customer_email',
        'customer_contact'
    ];
}
