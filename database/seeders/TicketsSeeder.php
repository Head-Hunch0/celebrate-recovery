<?php

namespace Database\Seeders;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $ticketTypes = ['personal', 'sponsored'];
    private $statuses = ['pending', 'confirmed', 'cancelled', 'refunded'];
    private $paymentMethods = ['card', 'mpesa', 'paypal'];
    private $cardBrands = ['visa', 'mastercard', 'amex', 'discover'];
    private $currencies = ['KES', 'USD', 'EUR'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create test users if none exist
        $users = User::all();
        if ($users->isEmpty()) {
            $users = User::factory(10)->create();
        }

        foreach ($this->statuses as $status) {
            $ticketsCount = rand(12, 18); // Approximately 15 per status

            for ($i = 0; $i < $ticketsCount; $i++) {
                $paymentMethod = $this->paymentMethods[array_rand($this->paymentMethods)];
                $ticketType = $this->ticketTypes[array_rand($this->ticketTypes)];
                $currency = $this->currencies[array_rand($this->currencies)];

                $ticketData = [
                    'userID' => $users->random()->id,
                    'ticket_type' => $ticketType,
                    'price' => $this->generatePrice($ticketType),
                    'quantity' => rand(1, 4),
                    'ticket_number' => 'TKT-' . strtoupper(uniqid()),
                    'status' => $status,
                    'payment_method' => $paymentMethod,
                    'payment_status' => $this->determinePaymentStatus($status),
                    'payment_reference' => $this->generatePaymentReference($paymentMethod),
                    'payment_amount' => $this->calculatePaymentAmount($ticketType, $currency),
                    'currency' => $currency,
                    'payment_date' => $this->getPaymentDate($status),
                    'purchased_at' => Carbon::now()->subDays(rand(1, 30)),
                ];

                // Add payment method specific fields
                $ticketData = array_merge($ticketData, $this->getPaymentDetails($paymentMethod, $status));

                // Add status-specific fields
                if ($status === 'refunded') {
                    $ticketData['refunded_at'] = Carbon::now()->subDays(rand(1, 10));
                    $ticketData['refund_amount'] = $ticketData['payment_amount'] * (rand(70, 100) / 100);
                    $ticketData['refund_reason'] = $this->getRefundReason();
                }

                if ($status === 'confirmed' && rand(0, 1)) {
                    $ticketData['checked_in_at'] = Carbon::now()->subHours(rand(1, 72));
                }

                Tickets::create($ticketData);
            }
        }
    }

    private function generatePrice(string $ticketType): float
    {
        return match ($ticketType) {
            'personal' => rand(500, 2000) + (rand(0, 99) / 100),
            'sponsored' => rand(2000, 10000) + (rand(0, 99) / 100),
            default => rand(1000, 5000),
        };
    }

    private function calculatePaymentAmount(string $ticketType, string $currency): float
    {
        $baseAmount = $this->generatePrice($ticketType);

        // Adjust for currency (simplified example)
        $multiplier = match ($currency) {
            'USD' => 0.008,
            'EUR' => 0.007,
            default => 1, // KES
        };

        return round($baseAmount * $multiplier, 2);
    }

    private function generatePaymentReference(string $method): string
    {
        $prefix = match ($method) {
            'mpesa' => 'MPESA',
            'paypal' => 'PYPL',
            'card' => 'CARD',
            default => 'PAY'
        };

        return $prefix . strtoupper(substr(uniqid(), -8)) . rand(100, 999);
    }

    private function determinePaymentStatus(string $ticketStatus): string
    {
        return match ($ticketStatus) {
            'confirmed' => 'completed',
            'cancelled' => rand(0, 1) ? 'failed' : 'pending',
            'refunded' => 'refunded',
            default => 'pending',
        };
    }

    private function getPaymentDate(string $status): ?Carbon
    {
        if (in_array($status, ['confirmed', 'refunded'])) {
            return Carbon::now()->subDays(rand(1, 30));
        }

        return $status === 'cancelled' && rand(0, 1)
            ? Carbon::now()->subDays(rand(1, 30))
            : null;
    }

    private function getPaymentDetails(string $method, string $status): array
    {
        $details = [];

        switch ($method) {
            case 'mpesa':
                $details = [
                    'mpesa_receipt_number' => 'MP' . rand(10000000, 99999999),
                    'mpesa_phone_number' => '2547' . rand(10000000, 99999999),
                    'mpesa_transaction_date' => in_array($status, ['confirmed', 'refunded'])
                        ? Carbon::now()->subDays(rand(1, 30))
                        : null,
                ];
                break;

            case 'paypal':
                $details = [
                    'paypal_transaction_id' => 'PAY-' . strtoupper(uniqid()),
                    'paypal_payer_id' => 'USER-' . strtoupper(substr(md5(rand()), 0, 8)),
                    'paypal_payer_email' => 'payer_' . rand(1000, 9999) . '@example.com',
                ];
                break;

            case 'card':
                $details = [
                    'card_last_four' => rand(1000, 9999),
                    'card_brand' => $this->cardBrands[array_rand($this->cardBrands)],
                    'card_expiry' => now()->addMonths(rand(6, 48))->format('m/y'),
                ];
                break;
        }

        return $details;
    }

    private function getRefundReason(): string
    {
        $reasons = [
            'Event cancelled by organizer',
            'Duplicate transaction',
            'Customer requested cancellation',
            'Payment processing error',
            'Insufficient funds',
            'Event postponed',
            'Ticket upgrade requested',
            'Customer dissatisfaction',
            'System error',
        ];

        return $reasons[array_rand($reasons)];
    }
}
