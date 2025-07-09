<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //

    protected $fillable = [
        // personal information
        'userID',

        // ticket information
        'ticket_type',
        'price',
        'quantity',
        'ticket_number',
        'status',

        // Payment information
        'payment_method',
        'payment_status',
        'payment_reference',
        'payment_amount',
        'currency',
        'payment_date',

        // M-Pesa specific fields
        'mpesa_receipt_number',
        'mpesa_phone_number',
        'mpesa_transaction_date',

        // PayPal specific fields
        'paypal_transaction_id',
        'paypal_payer_id',
        'paypal_payer_email',

        // Card payment fields
        'card_last_four',
        'card_brand',
        'card_expiry',

        // Additional timestamps
        'purchased_at',
        'checked_in_at',

        // Refund information
        'refunded_at',
        'refund_amount',
        'refund_reason',
        'notes'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'payment_amount' => 'decimal:2',
        'refund_amount' => 'decimal:2',
        'payment_date' => 'datetime',
        'mpesa_transaction_date' => 'datetime',
        'purchased_at' => 'datetime',
        'checked_in_at' => 'datetime',
        'refunded_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
