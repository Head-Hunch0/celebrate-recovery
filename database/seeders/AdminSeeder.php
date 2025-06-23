<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $emails = [
        'hwhitneyfamily@gmail.com',
        'Smbiti71@gmail.com',
        'wendykinyanjui@gmail.com',
        'dshikuta@gmail.com',
        'jeremywahuria@gmail.com',
        'jamesgithaiga02@gmail.com'
    ];


    protected $defaultPassword = 'CelebrateRecovery@25'; // Change this to your preferred default password


    public function run(): void
    {
        //

        foreach ($this->emails as $email) {
            // Check if user already exists
            if (!User::where('email', $email)->exists()) {
                User::create([
                    'full_name' => $this->generateNameFromEmail($email),
                    'email' => $email,
                    'password' => Hash::make($this->defaultPassword),
                    'uuid' => Str::uuid()->toString(),
                    'passwordchanged' => 0,
                    'phone_number' => '0712345678', // Default phone number, change as needed
                    'on_whatsapp' => false, // Default WhatsApp status
                    'in_cr_group' => false, // Default CR group status
                    'diet' => null, // Default diet, change as needed
                    'interested_in_starting_cr_group' => false, // Default interest in starting CR group
                    'willing_to_sponsor' => false, // Default willingness to sponsor    
                    // Add any additional fields your User model requires
                ]);

                $this->command->info("Created user for email: {$email} with default password");
            } else {
                $this->command->warn("User with email {$email} already exists, skipping...");
            }
        }
    }

    protected function generateNameFromEmail($email)
    {
        $namePart = explode('@', $email)[0];
        return ucfirst(str_replace(['.', '_'], ' ', $namePart));
    }
}
