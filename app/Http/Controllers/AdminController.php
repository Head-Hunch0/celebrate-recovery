<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationEmail;
use App\Mail\TicketEmail;
use App\Models\Schedule;
use App\Models\Speaker;
use App\Models\SpeakerToggle;
use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    //

    public function index() {

        $Schedule = Schedule::all();

        $wed = Schedule::where('day', 'Wednesday')->get();
        $thur = Schedule::where('day', 'Thursday')->get();
        $fri = Schedule::where('day', 'Friday')->get();
        $Schedule = Schedule::all();

        return view('index', compact('Schedule', 'wed', 'thur', 'fri'));
    }
    

    public function indexadmin() {

        // Get total registered users
        $totalUsers = User::count();

        // Get paid tickets count
        $paidTickets = Tickets::where('payment_status', 'completed')->count();

        // Get sponsoring users count
        $sponsors = Tickets::where('ticket_type', 'sponsored')->count();

        // Get pending payments
        $pendingTickets = Tickets::where('payment_status', 'pending')->count();

        // amounts 
        $totalAmount = Tickets::sum('price');
        $paidAmount = Tickets::where('payment_status', 'completed')->sum('price');
        $pendingAmount = Tickets::where('payment_status', 'pending')->sum('price');
        $sponsoringAmount = Tickets::where('ticket_type', 'sponsored')->sum('price');
        

        return view('admin.index', compact('totalUsers', 'paidTickets', 'sponsors', 'pendingTickets',
            'totalAmount', 'paidAmount', 'pendingAmount', 'sponsoringAmount'));
    }

    public function schedule()  {
        $wed = Schedule::where('day', 'Wednesday')->get();
        $thur = Schedule::where('day', 'Thursday')->get();
        $fri = Schedule::where('day', 'Friday')->get();
        $Schedule = Schedule::all();

        return view('admin.website.schedule', compact('Schedule', 'wed', 'thur', 'fri'));
    }

    public function scheduleAdd(Request $request) {

        Log::info($request->all());
        // Validate the request if necessary
        $validated = $request->validate([
            'topic' => 'required|string|max:255',
            'date' => 'required',
        ]);

        // Check if at least one timetable field exists
        if (!$request->hasAny(['timetable', 'timetable1', 'timetable2'])) {
            Log::error('No timetable selected', $request->all());
            return back()->withErrors(['timetable' => 'Select time for the schedule.']);
        }

        // Get the first available timetable value
        $time12h = $request->input('timetable')
            ?? $request->input('timetable1')
            ?? $request->input('timetable2');

        // Convert to MySQL time format (24-hour)
        $time24h = \Carbon\Carbon::createFromFormat('h:i A', $time12h)->format('H:i:s');
        // Convert "11:30 AM" to "11:30:00" (MySQL-compatible format)

        $Schedule = Schedule::create([
            'day' => $validated['date'] ,
            'theme' => $validated['topic'],
            'time' => $time24h, // Now in correct format
        ]);    
        
        // For now, just return a view or redirect
        return redirect()->route('admin.website.schedule')->with('message', "Schedule {$Schedule->theme} added successfully!");

    }

    public function scheduleDelete($id) {
        $Schedule = Schedule::findOrFail($id);
        $Schedule->delete();

        return redirect()->route('admin.website.schedule')->with('message', "Schedule {$Schedule->theme} deleted successfully!");
    }


    public function speaker() {
        $Speaker = Speaker::all();
        $wed = Speaker::where('day', 'Wednesday')->get();
        $thur = Speaker::where('day', 'Thursday')->get();
        $fri = Speaker::where('day', 'Friday')->get();
        $toggle = SpeakerToggle::first();

        return view('admin.website.speakers', compact('Speaker', 'wed', 'thur', 'fri', 'toggle'));
    }


    public function speakerAdd(Request $request) {

        Log::info($request->all());
        // Validate the request if necessary
        $validated = $request->validate([
            'theme'    => 'required|string|max:255',
            'speaker'  => 'required|string|max:255',
            'topic'    => 'required|string|max:255',
            'intro'    => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'day'      => 'required|string',
            'time' => 'required|date_format:h:i A', // Validate 12-hour time
        ]);


        // Convert to MySQL time format (24-hour)
        $time24h = \Carbon\Carbon::createFromFormat('h:i A', $validated['time'])->format('H:i:s');
        // Create the speaker entry
        $Speaker= Speaker::create([
            'day' => $validated['day'],
            'theme' => $validated['theme'],
            'speaker' => $validated['speaker'],
            'topic' => $validated['topic'],
            'intro' => $validated['intro'] ?? null,
            'time' => $time24h, // Now in correct format
            'location' => $validated['location'] ?? null,
        ]);


        return redirect()->route('admin.website.speaker')->with('message', "Speaker {$Speaker->speaker} added successfully!");
    }

    public function speakerDelete($id)
    {
        $Speaker = Speaker::findOrFail($id);
        $Speaker->delete();

        return redirect()->route('admin.website.speaker')->with('message', "Speaker {$Speaker->speaker} deleted successfully!");
    }

    public function speakerToggle(Request $request)
    {
        Log::info('Speaker toggle request received', $request->all());

        // Convert checkbox value to boolean
        $showSpeakers = $request->has('show_speakers'); // Returns true if "on", false if not present

        // Update the speaker toggle setting
        $toggle = SpeakerToggle::firstOrCreate([],['show' => false]);

        // Update the toggle status
        $toggle->update([
            'show' => $showSpeakers,
        ]);

        return redirect()->route('admin.website.speaker')
            ->with('message', 'Speakers visibility ' . ($showSpeakers ? 'enabled' : 'disabled') . ' successfully!');
        
    }

    public function registerPay(Request $request)
    {
        Log::info('Register pay request received', $request->all());
        $validated = $request->validate([
            'ticket_id' => 'required',
            'payment_method' => 'required',
            'payment_status' => 'required'
        ]);

        $ticket = Tickets::where('userID', $validated['ticket_id'])->firstOrFail();

        Log::info($ticket);

        $ticket->payment_method = $validated['payment_method'];
        $ticket->payment_status = $validated['payment_status'];
        $ticket->save();

        $user = User::find($ticket->userID);


        $userData = [
            'name' => $user->full_name,
            'email' => $user->email,
            'uuid' => $user->uuid,
            'ticket_type' => $ticket->ticket_type,
            'price' => $ticket->price,
            'phone' => $user->phone_number,
            'sponsored' => $user->willing_to_sponsor,
            'ticket_number' => $ticket->ticket_number, // Added for QR code reference

        ];

        Log::info($userData);
        // Send confirmation email with try-catch
        try {
            Mail::to($user->email)->send(new TicketEmail($userData));

            // Log successful email delivery
            Log::info('Confirmation email sent successfully to: ' . $user->email);

            return redirect()->back()->with('success', 'Ticket updated and confirmation email sent!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to send confirmation email: ' . $e->getMessage());

            // Return with success for ticket update but warning about email
            return redirect()->back()
                ->with('warning', 'Ticket updated but email failed to send: ' . $e->getMessage());
        }
    }
}
