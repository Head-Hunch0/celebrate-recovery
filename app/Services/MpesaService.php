<?php

namespace App\Services;

use Safaricom\Mpesa\Mpesa;
use App\Models\MpesaTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MpesaService
{
    // protected $mpesa;

    // public function __construct()
    // {
    //     $this->mpesa = new Mpesa();
    // }

    // public function initiateSTKPush($phoneNumber, $amount, $accountReference)
    // {
    //     $businessShortCode = config('mpesa.business_shortcode');
    //     $lipaNaMpesaPasskey = config('mpesa.lipa_na_mpesa_passkey');
    //     $callbackUrl = config('mpesa.callback');

    //     // Format phone number (ensure it starts with 254)
    //     $formattedPhone = $this->formatPhoneNumber($phoneNumber);

    //     try {
    //         $response = $this->mpesa->STKPushSimulation(
    //             $businessShortCode,
    //             $lipaNaMpesaPasskey,
    //             'CustomerPayBillOnline',
    //             $amount,
    //             $formattedPhone,
    //             $businessShortCode,
    //             $formattedPhone,
    //             $callbackUrl,
    //             $accountReference,
    //             'Payment',
    //             'Payment'
    //         );

    //         // Save transaction initiation
    //         $this->saveTransaction($response, $formattedPhone, $amount);

    //         return $response;
    //     } catch (\Exception $e) {
    //         Log::error('MPesa STK Push Error: ' . $e->getMessage());
    //         throw $e;
    //     }
    // }

    // protected function formatPhoneNumber($phoneNumber)
    // {
    //     // Remove any non-digit characters
    //     $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

    //     // Convert to 254 format if it starts with 0
    //     if (strpos($phoneNumber, '0') === 0) {
    //         $phoneNumber = '254' . substr($phoneNumber, 1);
    //     }

    //     // Ensure it's 12 digits (254...)
    //     if (strlen($phoneNumber) !== 12) {
    //         throw new \InvalidArgumentException('Invalid phone number format');
    //     }

    //     return $phoneNumber;
    // }

    // protected function saveTransaction($response, $phoneNumber, $amount)
    // {
    //     $responseData = json_decode(json_encode($response), true);

    //     return MpesaTransaction::create([
    //         'merchant_request_id' => $responseData['MerchantRequestID'] ?? null,
    //         'checkout_request_id' => $responseData['CheckoutRequestID'] ?? null,
    //         'phone_number' => $phoneNumber,
    //         'amount' => $amount,
    //         'result_desc' => 'Request initiated'
    //     ]);
    // }

    // public function handleCallback($callbackData)
    // {
    //     $callbackData = json_decode(json_encode($callbackData), true);

    //     // Find the transaction
    //     $transaction = MpesaTransaction::where('checkout_request_id', $callbackData['Body']['stkCallback']['CheckoutRequestID'])
    //         ->first();

    //     if (!$transaction) {
    //         Log::error('MPesa callback: Transaction not found', $callbackData);
    //         return;
    //     }

    //     // Update transaction with callback data
    //     $resultCode = $callbackData['Body']['stkCallback']['ResultCode'];
    //     $resultDesc = $callbackData['Body']['stkCallback']['ResultDesc'];

    //     $updateData = [
    //         'result_code' => $resultCode,
    //         'result_desc' => $resultDesc,
    //         'callback_metadata' => json_encode($callbackData)
    //     ];

    //     // If successful, add receipt details
    //     if ($resultCode === 0) {
    //         $callbackMetadata = $callbackData['Body']['stkCallback']['CallbackMetadata']['Item'];

    //         foreach ($callbackMetadata as $item) {
    //             if ($item['Name'] === 'MpesaReceiptNumber') {
    //                 $updateData['mpesa_receipt_number'] = $item['Value'];
    //             }
    //             if ($item['Name'] === 'TransactionDate') {
    //                 $updateData['transaction_date'] = $item['Value'];
    //             }
    //             if ($item['Name'] === 'Amount') {
    //                 $updateData['amount'] = $item['Value'];
    //             }
    //             if ($item['Name'] === 'PhoneNumber') {
    //                 $updateData['phone_number'] = $item['Value'];
    //             }
    //         }
    //     }

    //     $transaction->update($updateData);

    //     return $transaction;
    // }


    protected $mpesa;

    public function __construct()
    {
        $this->mpesa = new Mpesa();
    }

    public function initiateSTKPush($phoneNumber, $amount, $accountReference)
    {
        $businessShortCode = config('mpesa.business_shortcode');
        $lipaNaMpesaPasskey = config('mpesa.lipa_na_mpesa_passkey');
        $callbackUrl = config('mpesa.callback_url');
        
        $formattedPhone = $this->formatPhoneNumber($phoneNumber);
        $timestamp = Carbon::now()->format('YmdHis');
        $password = $this->generatePassword($businessShortCode, $lipaNaMpesaPasskey, $timestamp);

        try {
            // The Safaricom\Mpesa\Mpesa package handles authentication internally, so no need to manually generate an auth token.

            $response = $this->mpesa->STKPushSimulation(
                $businessShortCode,
                $lipaNaMpesaPasskey,
                'CustomerPayBillOnline',
                $amount,
                $formattedPhone,
                $businessShortCode,
                $formattedPhone,
                $callbackUrl,
                $accountReference,
                'Payment',
                'Payment'
            );

            // Convert response to array
            $responseData = json_decode(json_encode($response), true);

            if (!isset($responseData['MerchantRequestID'])) {
                Log::error('Invalid M-Pesa response', ['response' => $responseData]);
                throw new \Exception("Invalid response from M-Pesa API");
            }

            $this->saveTransaction($responseData, $formattedPhone, $amount);

            return $responseData;

        } catch (\Exception $e) {
            Log::error('MPesa STK Push Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => [
                    'BusinessShortCode' => $businessShortCode,
                    'PhoneNumber' => $formattedPhone,
                    'Amount' => $amount,
                    'AccountReference' => $accountReference
                ]
            ]);
            throw $e;
        }
    }

    protected function generatePassword($shortCode, $passkey, $timestamp)
    {
        return base64_encode($shortCode . $passkey . $timestamp);
    }

    protected function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        
        if (str_starts_with($phoneNumber, '0')) {
            return '254' . substr($phoneNumber, 1);
        }
        
        if (!str_starts_with($phoneNumber, '254')) {
            return '254' . $phoneNumber;
        }
        
        return $phoneNumber;
    }

    protected function saveTransaction($responseData, $phoneNumber, $amount)
    {
        return MpesaTransaction::create([
            'merchant_request_id' => $responseData['MerchantRequestID'],
            'checkout_request_id' => $responseData['CheckoutRequestID'],
            'phone_number' => $phoneNumber,
            'amount' => $amount,
            'result_desc' => 'Request initiated',
            'callback_metadata' => json_encode($responseData)
        ]);
    }

    public function handleCallback($callbackData)
    {
        $callbackData = json_decode(json_encode($callbackData), true);
        
        Log::info('MPesa Callback Received', $callbackData);

        try {
            $transaction = MpesaTransaction::where('checkout_request_id', $callbackData['Body']['stkCallback']['CheckoutRequestID'])
                ->firstOrFail();

            $resultCode = $callbackData['Body']['stkCallback']['ResultCode'];
            $updateData = [
                'result_code' => $resultCode,
                'result_desc' => $callbackData['Body']['stkCallback']['ResultDesc'],
                'callback_metadata' => json_encode($callbackData)
            ];

            if ($resultCode === 0) {
                $metadata = $callbackData['Body']['stkCallback']['CallbackMetadata']['Item'];
                foreach ($metadata as $item) {
                    switch ($item['Name']) {
                        case 'MpesaReceiptNumber':
                            $updateData['mpesa_receipt_number'] = $item['Value'];
                            break;
                        case 'TransactionDate':
                            $updateData['transaction_date'] = $item['Value'];
                            break;
                        case 'Amount':
                            $updateData['amount'] = $item['Value'];
                            break;
                        case 'PhoneNumber':
                            $updateData['phone_number'] = $item['Value'];
                            break;
                    }
                }
            }

            $transaction->update($updateData);

            return $transaction;

        } catch (\Exception $e) {
            Log::error('MPesa Callback Processing Error', [
                'error' => $e->getMessage(),
                'callback_data' => $callbackData
            ]);
            throw $e;
        }
    }
}
