<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merchant_request_id',
        'checkout_request_id',
        'phone_number',
        'amount',
        'mpesa_receipt_number',
        'transaction_date',
        'result_code',
        'result_desc',
        'callback_metadata'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'transaction_date' => 'datetime',
        'callback_metadata' => 'array'
    ];

    /**
     * Scope for successful transactions
     */
    public function scopeSuccessful($query)
    {
        return $query->where('result_code', 0);
    }

    /**
     * Scope for failed transactions
     */
    public function scopeFailed($query)
    {
        return $query->where('result_code', '!=', 0);
    }

    /**
     * Find transaction by merchant request ID
     */
    public static function findByMerchantRequestId($merchantRequestId)
    {
        return static::where('merchant_request_id', $merchantRequestId)->first();
    }

    /**
     * Find transaction by checkout request ID
     */
    public static function findByCheckoutRequestId($checkoutRequestId)
    {
        return static::where('checkout_request_id', $checkoutRequestId)->first();
    }

    /**
     * Check if transaction was successful
     */
    public function isSuccessful()
    {
        return $this->result_code === 0;
    }

    /**
     * Get formatted amount
     */
    public function getFormattedAmountAttribute()
    {
        return 'KES ' . number_format($this->amount, 2);
    }

    /**
     * Get formatted transaction date
     */
    public function getFormattedTransactionDateAttribute()
    {
        return $this->transaction_date?->format('d M Y H:i:s');
    }
}
