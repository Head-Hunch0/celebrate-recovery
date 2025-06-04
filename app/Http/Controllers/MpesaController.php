<?php

namespace App\Http\Controllers;

use App\Models\MpesaTransaction;
use App\Services\MpesaService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    //
    // protected $mpesaService;

    // public function __construct(MpesaService $mpesaService)
    // {
    //     $this->mpesaService = $mpesaService;
    // }

    // // Show form to initiate payment
    // public function showPaymentForm()
    // {
    //     return view('mpesa.payment');
    // }

    // // Process STK Push request
    // public function initiateStk(Request $request)
    // {

    //     Log::info($request->all());
    //     $validated = $request->validate([
    //         'number' => 'required|string',
    //         'amount' => 'required|numeric|',
    //         // 'account_reference' => 'required|string',
    //     ]);

    //     Log::info($validated);

    //     try {
    //         $response = $this->mpesaService->initiateSTKPush(
    //             $validated['number'],
    //             $validated['amount'],
    //             $validated['account_reference'] = Str::random(10)
    //         );

    //         return back()->with([
    //             'success' => 'STK push initiated successfully!',
    //             'checkout_request_id' => $response->CheckoutRequestID
    //         ]);
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Failed to initiate STK push: ' . $e->getMessage());
    //     }
    // }

    // // Handle M-Pesa callback (this remains as POST endpoint)
    // public function handleCallback(Request $request)
    // {
    //     $callbackData = $request->all();

    //     Log::info('MPesa Callback Received:', $callbackData);

    //     try {
    //         $transaction = $this->mpesaService->handleCallback($callbackData);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Callback processed successfully'
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('MPesa Callback Error:', [
    //             'error' => $e->getMessage(),
    //             'data' => $callbackData
    //         ]);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Failed to process callback'
    //         ], 500);
    //     }
    // }

    // // Check payment status
    // public function checkStatus(Request $request)
    // {
    //     $request->validate([
    //         'checkout_request_id' => 'required|string'
    //     ]);

    //     $transaction = MpesaTransaction::where('checkout_request_id', $request->checkout_request_id)
    //         ->first();

    //     if (!$transaction) {
    //         return back()->with('error', 'Transaction not found');
    //     }

    //     return view('mpesa.status', compact('transaction'));
    // }

    protected $mpesaService;

    public function __construct(MpesaService $mpesaService)
    {
        $this->mpesaService = $mpesaService;
    }

    public function showPaymentForm()
    {
        return view('mpesa.payment');
    }

    public function initiatePayment(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|min:10|max:12',
            'amount' => 'required|numeric|min:1|max:150000',
            // 'account_reference' => 'required|string|max:255',
        ]);

        try {
            Log::info($this->mpesaService::class);
            $response = $this->mpesaService->initiateSTKPush(
                $validated['number'],
                $validated['amount'],
                // $validated['account_reference']
                $validated['account_reference'] = Str::random(10)
            );

            return redirect()->route('payment.status')
                ->with([
                    'success' => 'Payment request sent to your phone!',
                    'checkout_request_id' => $response['CheckoutRequestID']
                ]);
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Failed to initiate payment: ' . $e->getMessage());
        }
    }

    public function paymentStatus(Request $request)
    {
        $request->validate([
            'checkout_request_id' => 'sometimes|string'
        ]);

        $checkoutRequestId = $request->checkout_request_id ?? session('checkout_request_id');

        if (!$checkoutRequestId) {
            return redirect()->route('payment.form')
                ->with('error', 'No payment session found');
        }

        $transaction = MpesaTransaction::where('checkout_request_id', $checkoutRequestId)
            ->first();

        return view('mpesa.status', compact('transaction'));
    }

    public function handleCallback(Request $request)
    {
        try {
            $this->mpesaService->handleCallback($request->all());
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
