<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetEmail;
use App\Mail\RegistrationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function email(){
        return view('admin.comms.emails.sponsorconfirm');
    }
    //
    public function register(Request $request)
    {

        // Honeypot validation - if this field is filled, it's a bot
        if (!empty($request->input('website'))) {
            Log::warning('Bot detected via honeypot');
            return back()->with('error', 'Invalid submission');
        }

        // Time trap (submitted too fast = likely bot)
        $submitTime = now()->timestamp - (int)$request->form_load_time;
        if ($submitTime < 3) { // Less than 3 seconds
            Log::warning('Bot detected: form submitted too fast');
            return back()->with('error', 'Please complete the form more slowly');
        }


        try {
            $validated = $request->validate([
                'name' => 'string|max:255',
                'email' => 'email|',
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
                'num' => 'nullable|string|max:20',
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
            'uuid' => Str::random(10),
            'email' => $validated['email'],
            'gender' => $validated['sex'] ?? null,
            'phone_number' => $validated['phone'],
            'country' => $validated['country'] ?? null,
            'county' => $validated['county'] ?? null,
            'on_whatsapp' => $validated['wa'] ?? 'n/a',
            // 'on_whatsapp' => $validated['wa'],
            'age' => $validated['age'] ?? null,
            'church' => $validated['church'] ?? null,
            'in_cr_group' => $validated['cr'] ?? false,
            'cr_group_name' => $validated['crgroup'] ?? null,
            'diet' => $validated['diet'] ?? null,
            'interested_in_starting_cr_group' => $validated['crstart'] ?? false,
            'willing_to_sponsor' => $validated['num'] ?? false,
        ]);

        $userData = [
            'name' => $user->full_name,
            'email' => $user->email,
            'uuid' => $user->uuid,
            'phone' => $user->phone_number,
            'ticket' => '1000',
            'ticketUsd' => '7.75',
            'sponsoring' => $user->willing_to_sponsor * 1000,
            'sponsoringUsd' => $user->willing_to_sponsor * 7.75,
            'total' => 1000 + ($user->willing_to_sponsor * 1000),
            'totalUsd' => 7.75 + ($user->willing_to_sponsor * 7.75),
        ];

        // Send confirmation email
        Mail::to($request->email)->send(new RegistrationEmail($userData));
        // Log the user in
        $ticket = '1000';
        $ticketUsd = '7.75';
        $uuid = $user->uuid;
        $sponsoring = $user->willing_to_sponsor * $ticket;
        $sponsoringUsd = $user->willing_to_sponsor * $ticketUsd;
        $total = $ticket + $sponsoring;
        $totalUsd = $ticketUsd + $sponsoringUsd;

        // dd($total, $sponsoring, $ticket, $uuid);

        // return view('checkout')->with('message', 'Registration successful! Please check your email for verification.');
        return view('checkout', compact('ticket', 'total', 'uuid', 'sponsoring','totalUsd','ticketUsd','sponsoringUsd'))->with('message', 'Registration successful! Please check your email for verification.');
    }

    public function registersponsor(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'string|max:255',
                'email' => 'email',
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
                'num' => 'nullable|string|max:20',
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
            'uuid' => Str::random(10),
            'email' => $validated['email'],
            'gender' => $validated['sex'] ?? null,
            'phone_number' => $validated['phone'],
            'country' => $validated['country'] ?? null,
            'county' => $validated['county'] ?? null,
            'on_whatsapp' => $validated['wa'] ?? 'n/a',
            // 'on_whatsapp' => $validated['wa'],
            'age' => $validated['age'] ?? null,
            'church' => $validated['church'] ?? null,
            'in_cr_group' => $validated['cr'] ?? false,
            'cr_group_name' => $validated['crgroup'] ?? null,
            'diet' => $validated['diet'] ?? null,
            'interested_in_starting_cr_group' => $validated['crstart'] ?? false,
            'willing_to_sponsor' => $validated['num'] ?? false,
        ]);

        $userData = [
            'name' => $user->full_name,
            'email' => $user->email,
            'uuid' => $user->uuid,
            'phone' => $user->phone_number,
            'sponsored' => $user->willing_to_sponsor,
            'sponsored' => $user->willing_to_sponsor,
        ];


        Log::info('User created', $user->toArray());

        // // Send confirmation email
        // Mail::to($request->email)->send(new RegistrationEmail($userData));
        // Log the user in
        $ticket = '1000';
        $ticketUsd = '7.75';
        $uuid = $user->uuid;
        $sponsoring = $user->willing_to_sponsor * $ticket;
        $sponsoringUsd = $user->willing_to_sponsor * $ticketUsd;
        $total = $ticket + $sponsoring;
        $totalUsd = $ticketUsd + $sponsoringUsd;

        // dd($total, $sponsoring, $ticket, $uuid);

        // return view('checkout')->with('message', 'Registration successful! Please check your email for verification.');
        return view('checkoutsponsor', compact('ticket', 'total', 'uuid', 'sponsoring', 'totalUsd', 'ticketUsd', 'sponsoringUsd'))->with('message', 'Registration successful! Please check your email for verification.');
    }

    public function login(){
        return view('login');
    }

    public function forgotpassword()
    {
        return view('resetpassword');
    }

    public function sendResetLink(Request $request)
    {
        Log::info('Password reset request received for email: ' . $request->email);
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Explicit error for unregistered emails
            return back()->with('status', 'This email is not registered in our system.');
        }

        // Generate and send reset link
        $resetUrl = URL::temporarySignedRoute(
            'password.reset',
            now()->addMinutes(60),
            ['email' => $user->email]
        );

        Mail::to($user->email)->send(new PasswordResetEmail($user, $resetUrl));

        // Clear success message
        return back()->with('status', 'Password reset link has been sent to your email!');
    }


    public function showResetForm(Request $request)
    {
        // Automatically validates the signed URL
        if (!$request->hasValidSignature()) {
            abort(403, 'Invalid or expired link');
        }

        return view('updatepass', [
            'email' => $request->email
        ]);
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8' // Ensures password matches confirmation
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        $user->forceFill([
            'password' => Hash::make($request->password),
            'passwordchanged' => true, // Critical: Must match your login check
        ])->save();

        // Manually log the user in immediately after reset
        Auth::login($user);

    }


    public function signin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Add additional validation if needed
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt login
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();

            // Do additional checks if needed
            if (!$user->passwordchanged) {
                return view('admin.passconfirm', ['user' => $user->email])
                    ->with('message', 'You need to change your password before proceeding.');
            }

            return redirect()->route('admin.index')->with('success', 'Login successful');
        }

        // Authentication failed
        return back()->withInput()->with('error', 'Invalid credentials');
    }

    public function passconfirm(Request $request)
    {
        return view('admin.passconfirm');
    }


    public function passupdate(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()],
        ]);

        $user = User::where('email', $request->user)->first();

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'The provided password does not match our records.'
            ]);
        }

        // Update user fields directly and save
        $user->password = Hash::make($request->password);
        $user->passwordchanged = 1; // Mark password as changed
        $user->save();

        return redirect()->route('admin.index')
            ->with('success', 'Password updated successfully!');
    }
}
