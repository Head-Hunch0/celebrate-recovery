<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function show()
    {
        return view('details');
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
