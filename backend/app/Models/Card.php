<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;


    protected $fillable = [
        'card_number',
        'pin',
        'activation_date',
        'expiry_date',   
        'balance'
    ];


    protected $casts = [
        'activation_date' => 'datetime',
        'expiry_date' => 'date',
        'balance' => 'decimal:2',
    ];
}