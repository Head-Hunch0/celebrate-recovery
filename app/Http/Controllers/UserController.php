<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'gender' => 'nullable|string',
            'phone_number' => 'required|string|max:20',
            'country' => 'nullable|string',
            'county' => 'nullable|string',
            'on_whatsapp' => 'required|boolean',
            'whatsapp_number' => 'nullable|string|max:20',
            'age' => 'nullable|integer|min:1',
            'church' => 'nullable|string|max:255',
            'in_cr_group' => 'nullable|boolean',
            'cr_group_name' => 'nullable|string|max:255',
            'interested_in_starting_cr_group' => 'nullable|boolean',
            'willing_to_sponsor' => 'required|boolean',
        ]);


        // Create a new user
        User::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'] ?? null,
            'phone_number' => $validated['phone_number'],
            'country' => $validated['country'] ?? null,
            'county' => $validated['county'] ?? null,
            'on_whatsapp' => $validated['on_whatsapp'],
            'whatsapp_number' => $validated['whatsapp_number'] ?? null,
            'age' => $validated['age'] ?? null,
            'church' => $validated['church'] ?? null,
            'in_cr_group' => $validated['in_cr_group'] ?? false,
            'cr_group_name' => $validated['cr_group_name'] ?? null,
            'interested_in_starting_cr_group' => $validated['interested_in_starting_cr_group'] ?? false,
            'willing_to_sponsor' => $validated['willing_to_sponsor'],
        ]);

        // Log the user in

        // Redirect to the dashboard or any other page
        return redirect()->back()->with('message', 'Registration successful! Please check your email for verification.');

    }
}
