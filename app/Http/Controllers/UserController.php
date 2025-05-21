<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'string|max:255',
                'email' => 'email|unique:users,email',
                'sex' => 'nullable|string',
                'wa' => 'string',
                'phone' => 'string|max:20',
                'country' => 'nullable|string',
                'county' => 'nullable|string',
                'age' => 'nullable|string',
                'church' => 'nullable|string|max:255',
                'cr' => 'nullable|string',
                'crgroup' => 'nullable|string|max:255',
                'diet' => 'nullable|string|max:255',
                'crstart' => 'nullable|string',
                'sponsor' => 'string',
            ]);
            Log::info('Validated data:', $validated);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', $e->errors());
            return back()->withErrors($e->validator)->withInput();
        }

        Log::info($validated);
        // Create a new user
        $user = User::create([
            'full_name' => $validated['name'],
            'uuid' => Str::uuid()->toString(),
            'email' => $validated['email'],
            'gender' => $validated['sex'] ?? null,
            'phone_number' => $validated['phone'],
            'country' => $validated['country'] ?? null,
            'county' => $validated['county'] ?? null,
            'on_whatsapp' => $validated['wa'],
            'age' => $validated['age'] ?? null,
            'church' => $validated['church'] ?? null,
            'in_cr_group' => $validated['cr'] ?? false,
            'cr_group_name' => $validated['crgroup'] ?? null,
            'diet' => $validated['diet'] ?? null,
            'interested_in_starting_cr_group' => $validated['crstart'] ?? false,
            'willing_to_sponsor' => $validated['sponsor'],
        ]);

        Log::info('User created', $user->toArray());

        // Log the user in
        $ticket = '1000';
        $uuid = $user->uuid;
        $sponsoring = $user->willing_to_sponsor * $ticket;
        $total = $ticket + $sponsoring;

        // dd($total, $sponsoring, $ticket, $uuid);

        // return view('checkout')->with('message', 'Registration successful! Please check your email for verification.');
        return view('checkout', compact('ticket', 'total', 'uuid', 'sponsoring',))->with('message', 'Registration successful! Please check your email for verification.');
    }

    public function login(){
        return view('login');
    }
}
