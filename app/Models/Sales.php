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
        'reference_num',
        'customer_name',
        'customer_quantity',
        'customer_email',
        'customer_contact',
        'status'
    ];
}
