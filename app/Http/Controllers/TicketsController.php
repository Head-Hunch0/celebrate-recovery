<?php

namespace App\Http\Controllers;

use App\Mail\TicketEmail;
use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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

    public function checkout(Request $request)
    {
        return view('checkout', [
            'ticket' => $request->query('ticket'),
            'total' => $request->query('total'),
            'uuid' => $request->query('uuid'),
            'sponsoring' => $request->query('sponsoring'),
            'totalUsd' => $request->query('totalUsd'),
            'ticketUsd' => $request->query('ticketUsd'),
            'sponsoringUsd' => $request->query('sponsoringUsd')
        ]);
    }

    public function index(){
        return view('admin.index');
    }

    public function registered()
    {
        //
        $tickets = [];
        // Fetch all registered tickets from the database
        $tickets = User::get();

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
        $tickets = Tickets::where('payment_status', 'completed')->get();

        // add the name, email, and phone of the user who registered the ticket
        foreach ($tickets as $key) {
            $key['name'] = User::where('id', $key->userID)->first()->full_name;
            $key['email'] = User::where('id', $key->userID)->first()->email;
            $key['phone'] = User::where('id', $key->userID)->first()->phone_number;
        }

        // Return the view with the tickets data

        // dd($tickets->toArray());
        return view('admin.tickets.confirmed-tickets', compact('tickets'));
    }

    public function downloadConfirmedTickets()
    {
        $tickets = Tickets::where('payment_status', 'completed')
            ->with('user:id,full_name,email,phone_number') // Eager load user data
            ->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=confirmed_tickets_" . date('Y-m-d') . ".csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($tickets) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, [
                'Ticket ID',
                'User Name',
                'User Email',
                'User Phone',
                'Event',
                'Ticket Type',
                'Quantity',
                'Amount Paid',
                'Payment Date',
                'Payment Method'
            ]);

            $event['name'] = "CelebrateRecovery@25";
            // Add data rows
            foreach ($tickets as $ticket) {
                fputcsv($file, [
                    $ticket->id,
                    $ticket->user->full_name,
                    $ticket->user->email,
                    $ticket->user->phone_number,
                    $ticket->event->name ?? 'N/A', // Assuming event relationship
                    $ticket->ticket_type,
                    $ticket->quantity,
                    $ticket->amount_paid,
                    $ticket->payment_date,
                    $ticket->payment_method
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    
    public function downloadRegisteredTickets()
    {
        $tickets = Tickets::with('user:id,full_name,email,phone_number') // Eager load user data
            ->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=registered_tickets_" . date('Y-m-d') . ".csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($tickets) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, [
                'Ticket ID',
                'User Name',
                'User Email',
                'User Phone',
                'Event',
                'Ticket Type',
                'Quantity',
                'Amount Paid',
                'Payment Date',
                'Payment Method'
            ]);

            $event['name'] = "CelebrateRecovery@25";
            // Add data rows
            foreach ($tickets as $ticket) {
                fputcsv($file, [
                    $ticket->id,
                    $ticket->user->full_name,
                    $ticket->user->email,
                    $ticket->user->phone_number,
                    $ticket->event->name ?? 'N/A', // Assuming event relationship
                    $ticket->ticket_type,
                    $ticket->quantity,
                    $ticket->amount_paid,
                    $ticket->payment_date,
                    $ticket->payment_method
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function sponsoring()
    {
        //
        // Fetch all confirmed tickets from the database
        $tickets = Tickets::where('ticket_type', 'sponsored')->get();

        // add the name, email, and phone of the user who registered the ticket
        foreach ($tickets as $key) {
            $key['name'] = User::where('id', $key->userID)->first()->full_name;
            $key['email'] = User::where('id', $key->userID)->first()->email;
            $key['phone'] = User::where('id', $key->userID)->first()->phone_number;
        }

        // Return the view with the tickets data
        return view('admin.tickets.sponsoring-tickets', compact('tickets'));
    }

    public function payment(Request $request)
    {
        Log::info('Payment request data:', $request->all());
        // Validate the request data
        $validated = $request->validate([
            'price' => 'required|numeric',
        ]);


        Log::info('Validated data:', $validated);
        // Process the payment here
        // ...

        $user = User::where('uuid', $request->uuid)->firstOrFail();
        if($user->willing_to_sponsor !== 0){
            $validated['ticket_type'] = 'personal';
            $validated['price'] = $validated['price'] ?? 1000; // Default price if not provided
        }
        Log::info('User data:', $user->toArray());
        $ticket = Tickets::create([
            'userID' => $user['id'],
            'ticket_type' => $validated['ticket_type'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'] ?? 1,
            'ticket_number' => 'CR@25-' . strtoupper(uniqid()),

            'status' => 'confirmed',
            'payment_method' => 'mpesa', // Assuming payment method is mpesa for this example
            'payment_status' => 'pending',
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

        // Log::info('Ticket created:', $ticket->toArray());
        // dd($ticket);
        // Redirect to a success page or return a response
        // return view('ticket', compact('ticket'))->with('message', 'Payment successful!');
        // return redirect()->route('ticket')->with('message', 'Payment successful!')->with(['ticket' => $ticket]);
        $userData = [
            'name' => $user->full_name,
            'email' => $user->email,
            'uuid' => $user->uuid,
            'phone' => $user->phone_number,
            'ticket_number' => $ticket,
            'ticket_type' => $validated['ticket_type'],
            'price' => $validated['price'],
        ];

        // Log the user data
        Log::info('User data for ticket creation:', $userData);

        Log::info('User created', $user->toArray());

        // Send confirmation email
        // Mail::to($user->email)->send(new TicketEmail($userData));

        return view('confirm');

    }

    public function paymentsponsor(Request $request)
    {
        Log::info('Payment request data:', $request->all());
        // Validate the request data
        $validated = $request->validate([
            'price' => 'required|numeric',
        ]);


        Log::info('Validated data:', $validated);


        $user = User::where('uuid', $request->uuid)->firstOrFail();
        if ($user->willing_to_sponsor !== 0) {
            $validated['ticket_type'] = 'sponsored';
            $validated['price'] = 1000;
        }
        Log::info('User data:', $user->toArray());
        $ticket = Tickets::create([
            'userID' => $user['id'],
            'ticket_type' => $validated['ticket_type'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'] ?? 1,
            'ticket_number' => 'CR@25-' . strtoupper(uniqid()),

            'status' => 'confirmed',
            'payment_method' => 'mpesa', // Assuming payment method is mpesa for this example
            // 'payment_method' => $validated['payment_method'],
            'payment_status' => 'pending',
            'payment_reference' => $validated['payment_reference'] ?? null,
            'payment_amount' => $validated['price'],
            'currency' => 'KES',
            'payment_date' => Carbon::now(),

            'mpesa_receipt_number' => $validated['confirmation'] ?? null,
            'mpesa_phone_number' => $user->phone_number ?? null,
            'mpesa_transaction_date' => Carbon::now(),

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

        return view('thankyou');

    }

    // demo ticket
    public function ticket($id)
    {
        Log::info($id);
        // Generate a unique ticket number
        $ticketNumber = $id;
        // $ticketNumber = 'TKT-6828E6ED0193E';

        $ticket = Tickets::where('ticket_number', $id)->first();

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

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $tickets = User::search($searchTerm)->get();

        return response()->json([
            'tickets' => $tickets
        ]);
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

    public function sponsored(){

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tickets $tickets)
    {
        //
    }
}
