<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        ];


        Log::info('User created', $user->toArray());

        // Send confirmation email
        Mail::to($request->email)->send(new RegistrationEmail($userData));
        // Log the user in
        $ticket = '1000';
        $uuid = $user->uuid;
        $sponsoring = $user->willing_to_sponsor * $ticket;
        $total = $ticket + $sponsoring;

        // dd($total, $sponsoring, $ticket, $uuid);

        // return view('checkout')->with('message', 'Registration successful! Please check your email for verification.');
        return view('checkout', compact('ticket', 'total', 'uuid', 'sponsoring',))->with('message', 'Registration successful! Please check your email for verification.');
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
        $uuid = $user->uuid;
        $sponsoring = $user->willing_to_sponsor * $ticket;
        $total = $ticket + $sponsoring;

        // dd($total, $sponsoring, $ticket, $uuid);

        // return view('checkout')->with('message', 'Registration successful! Please check your email for verification.');
        return view('checkoutsponsor', compact('ticket', 'total', 'uuid', 'sponsoring',))->with('message', 'Registration successful! Please check your email for verification.');
    }

    public function login(){
        return view('login');
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
