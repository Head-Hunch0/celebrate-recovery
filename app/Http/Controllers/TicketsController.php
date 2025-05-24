<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function show()
    {
        return view('details');
    }
    public function sponsor()
    {
        return view('sponsor');
    }
    public function thankyou()
    {
        return view('thankyou');
    }
    public function sponsorstore()
    {
        return view('thankyou');
    }

    public function checkout(){
        return view('checkout');
    }

    public function index(){
        return view('admin.index');
    }

    public function registered()
    {
        //
        // Fetch all registered tickets from the database
        $tickets = Tickets::where('status', 'pending')->get();

        // add the name, email, and phone of the user who registered the ticket
        foreach ($tickets as $key){
            $key['name'] = User::where('id', $key->userID)->first()->firstname . ' ' . User::where('id', $key->userID)->first()->lastname;
            $key['email'] = User::where('id', $key->userID)->first()->email;
            $key['phone'] = User::where('id', $key->userID)->first()->phone;
        }

        // Return the view with the tickets data
        return view('admin.tickets.registered-tickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function confirmed()
    {
        //
        // Fetch all confirmed tickets from the database
        $tickets = Tickets::where('status', 'confirmed')->get();

        // add the name, email, and phone of the user who registered the ticket
        foreach ($tickets as $key) {
            $key['name'] = User::where('id', $key->userID)->first()->firstname . ' ' . User::where('id', $key->userID)->first()->lastname;
            $key['email'] = User::where('id', $key->userID)->first()->email;
            $key['phone'] = User::where('id', $key->userID)->first()->phone;
        }

        // Return the view with the tickets data
        return view('admin.tickets.confirmed-tickets', compact('tickets'));
    }

    public function sponsoring()
    {
        //
        // Fetch all confirmed tickets from the database
        $tickets = Tickets::where('ticket_type', 'sponsored')->get();

        // add the name, email, and phone of the user who registered the ticket
        foreach ($tickets as $key) {
            $key['name'] = User::where('id', $key->userID)->first()->firstname . ' ' . User::where('id', $key->userID)->first()->lastname;
            $key['email'] = User::where('id', $key->userID)->first()->email;
            $key['phone'] = User::where('id', $key->userID)->first()->phone;
        }

        // Return the view with the tickets data
        return view('admin.tickets.sponsoring-tickets', compact('tickets'));
    }

    public function payment(Request $request)
    {
        Log::info('Payment request data:', $request->all());
        // Validate the request data
        $validated = $request->validate([
            'confirmation' => 'required|regex:/^[A-Z0-9]{10}$/|size:10',
        ]);


        Log::info('Validated data:', $validated);
        // Process the payment here
        // ...

        $user = User::where('uuid', $request->uuid)->firstOrFail();
        if($user->willing_to_sponsor !== 0){
            $validated['ticket_type'] = 'sponsored';
            $validated['price'] = 1000;
        }
        Log::info('User data:', $user->toArray());
        $ticket = Tickets::create([
            'userID' => $validated['userID'] ?? null,
            'ticket_type' => $validated['ticket_type'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'] ?? 1,
            'ticket_number' => 'CR@25-' . strtoupper(uniqid()),

            'status' => 'confirmed',
            'payment_method' => 'mpesa', // Assuming payment method is mpesa for this example
            // 'payment_method' => $validated['payment_method'],
            'payment_status' => 'completed',
            'payment_reference' => $validated['payment_reference'] ?? null,
            'payment_amount' => $validated['price'],
            'currency' => 'KES',
            'payment_date' => Carbon::now(),

            'mpesa_receipt_number' => $validated['confirmation'] ?? null,
            'mpesa_phone_number' => $user->phone_number ?? null,
            'mpesa_transaction_date' => Carbon::now() ,

            'paypal_transaction_id' => $validated['paypal_transaction_id'] ?? null,
            'paypal_payer_id' => $validated['paypal_payer_id'] ?? null,
            'paypal_payer_email' => $validated['paypal_payer_email'] ?? null,

            'card_last_four' => $validated['card_last_four'] ?? null,
            'card_brand' => $validated['card_brand'] ?? null,
            'card_expiry' => $validated['card_expiry'] ?? null,

            'purchased_at' => Carbon::now(),
            'notes' => $validated['notes'] ?? null,
        ]);
        $ticket = $ticket->ticket_number;

        Log::info('Ticket created:', $ticket->toArray());
        // dd($ticket);
        // Redirect to a success page or return a response
        return view('checkout', compact('ticket'))->with('message', 'Payment successful!');
        // return redirect()->route('checkout')->with('message', 'Payment successful!');

    }

    // demo ticket
    public function ticket(Request $request)
    {
        // Generate a unique ticket number
        // $ticketNumber = $request->input('ticket_number');
        $ticketNumber = 'TKT-6828E6ED0193E';

        $ticket = Tickets::where('ticket_number', $ticketNumber)->first();

        if (!$ticket) {
            // Return a view with error message
            return view('invalidticket', [
                'error' => 'Ticket not found in our system',
                'ticketNumber' => $ticketNumber,
                'ticket' => null
            ]);
        }

        // Log::info('Ticket data:', $ticket->toArray());
        return view('ticketqr', compact('ticketNumber', 'ticket'));
    }

    // real ticket
    // In your Laravel controller
    public function showTicket($ticketId)
    {
        $ticket = Tickets::findOrFail($ticketId);
        return view('ticket', ['ticket' => $ticket]);
    }


    // Verify ticket by scanning QR code
    public function verify(Request $request)
    {

        Log::info('Verify ticket request data:', $request->all());
        $request->validate([
            'ticket_number' => 'required|string',
        ]);

        $ticket = Tickets::where('ticket_number', $request->ticket_number)->first();

        if (!$ticket) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket not found'
            ], 404);
        }

        if ($ticket->checked_in_at) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket already used on ' . $ticket->checked_in_at->format('M j, Y g:i A')
            ], 400);
        }

        // Mark as used
        $ticket->update(['checked_in_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => 'Ticket verified successfully',
            'ticket' => $ticket
        ]);
    }

    // Get ticket details
    public function showdeets($ticketNumber)
    {
        $ticket = Tickets::where('number', $ticketNumber)->firstOrFail();
        return response()->json($ticket);
    }

    public function ticketsscan()
    {
        return view('admin.tickets.ticketscanner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(Tickets $tickets)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $tickets)
    {
        //
    }
}
