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
        // Fetch all confirmed tickets with their associated user data
        $tickets = Tickets::where('payment_status', 'completed')
            ->with('user') // assuming you have a 'user' relationship in your Ticket model
            ->get();

        // If you want to merge all user attributes into each ticket object
        foreach ($tickets as $ticket) {
            if ($ticket->user) { // check if user exists
                $userAttributes = $ticket->user->toArray();
                foreach ($userAttributes as $key => $value) {
                    // Skip the id field to avoid overwriting the ticket's id
                    if ($key !== 'id') {
                        $ticket->$key = $value;
                    }
                }
            }
        }

        return view('admin.tickets.confirmed-tickets', compact('tickets'));
    }


    public function downloadConfirmedTickets()
    {
        $tickets = Tickets::where('payment_status', 'completed')
            ->with(['user' => function ($query) {
                $query->select([
                    'id',
                    'full_name',
                    'uuid',
                    'email',
                    'gender',
                    'phone_number',
                    'country',
                    'county',
                    'on_whatsapp',
                    // 'whatsapp_number',
                    'age',
                    'church',
                    'in_cr_group',
                    'cr_group_name',
                    'interested_in_starting_cr_group',
                    'willing_to_sponsor'
                ]);
            }])
            ->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=cr25_confirmed_tickets_" . date('Y-m-d') . ".csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($tickets) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, [
                'Ticket ID',
                'Full Name',
                'UUID',
                'Email',
                'Gender',
                'Phone Number',
                'Country',
                'County',
                'On WhatsApp?',
                'WhatsApp Number',
                'Age',
                'Church',
                'In CR Group?',
                'CR Group Name',
                'Interested in Starting CR Group?',
                'Willing to Sponsor?',
                'Ticket Type',
                'Quantity',
                'Amount Paid',
                'Payment Date',
                'Payment Method',
                'created_at',
            ]);

            // Add data rows
            foreach ($tickets as $ticket) {
                fputcsv($file, [
                    $ticket->id,
                    $ticket->user->full_name ?? 'N/A',
                    $ticket->user->uuid ?? 'N/A',
                    $ticket->user->email ?? 'N/A',
                    $ticket->user->gender ?? 'N/A',
                    $ticket->user->phone_number ?? 'N/A',
                    $ticket->user->country ?? 'N/A',
                    $ticket->user->county ?? 'N/A',
                    $ticket->user->on_whatsapp ? 'Yes' : 'No',
                    $ticket->user->whatsapp_number ?? 'N/A',
                    $ticket->user->age ?? 'N/A',
                    $ticket->user->church ?? 'N/A',
                    $ticket->user->in_cr_group ? 'Yes' : 'No',
                    $ticket->user->cr_group_name ?? 'N/A',
                    $ticket->user->interested_in_starting_cr_group ? 'Yes' : 'No',
                    $ticket->user->willing_to_sponsor ? 'Yes' : 'No',
                    $ticket->ticket_type ?? 'N/A',
                    $ticket->quantity ?? '0',
                    $ticket->amount_paid ?? '0',
                    $ticket->payment_date ?? 'N/A',
                    $ticket->payment_method ?? 'N/A',
                    $ticket->created_at ? $ticket->created_at->format('Y-m-d H:i:s') : 'N/A'
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    
    public function downloadRegisteredTickets()
    {

        Log::alert('Download registered tickets request received');
        $tickets = User::get();

        Log::info('Registered tickets data:', $tickets->toArray());
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
                'Registration ID',
                'Full Name',
                'UUID',
                'Email',
                'Gender',
                'Phone Number',
                'Country',
                'County',
                'On WhatsApp?',
                'WhatsApp Number',
                'Age',
                'Church',
                'In CR Group?',
                'CR Group Name',
                'Diet',
                'Interested in Starting CR Group?',
                'Willing to Sponsor?',
                'Ticket Type',
                'Quantity',
                'Amount Paid',
                'Payment Date',
                'Payment Method',
                'created_at',
            ]);

            $event['name'] = "CelebrateRecovery@25";
            // Add data rows
            foreach ($tickets as $ticket) {
                fputcsv($file, [
                    $ticket->id,
                    $ticket->full_name ?? 'N/A',
                    $ticket->uuid ?? 'N/A',
                    $ticket->email ?? 'N/A',
                    $ticket->gender ?? 'N/A',
                    $ticket->phone_number ?? 'N/A',
                    $ticket->country ?? 'N/A',
                    $ticket->county ?? 'N/A',
                    $ticket->on_whatsapp ? 'Yes' : 'No',
                    $ticket->whatsapp_number ?? 'N/A',
                    $ticket->age ?? 'N/A',
                    $ticket->church ?? 'N/A',
                    $ticket->in_cr_group ? 'Yes' : 'No',
                    $ticket->cr_group_name ?? 'N/A',
                    $ticket->diet ?? 'N/A',
                    $ticket->interested_in_starting_cr_group ? 'Yes' : 'No',
                    $ticket->willing_to_sponsor ? 'Yes' : 'No',
                    $ticket->ticket_type ?? 'N/A',
                    $ticket->willing_to_sponsor ?? '0',
                    $ticket->amount_paid ?? '0',
                    $ticket->payment_date ?? 'N/A',
                    $ticket->payment_method ?? 'N/A',
                    $ticket->created_at ? $ticket->created_at->format('Y-m-d H:i:s') : 'N/A'
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
    public function destroy(Request $request, $tickets)
    {

        $tickets = User::findOrFail($tickets);
        // Check if the ticket exists
         $ticket = Tickets::where('userID', $tickets)->firstOrFail();

         Log::info('Deleting ticket:', $ticket->toArray());

         dd('Deleting ticket:', $ticket->toArray());

        Log::info('Deleting ticket:', ['ticket_id' => $tickets->id, 'ticket_number' => $tickets->ticket_number]);
        // $tickets->delete();
        return redirect()->back()->with('success', 'Ticket deleted successfully');
           //
    }

    // TicketController.php

}
