<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',
        'uuid',
        'email',
        'gender',
        'phone_number',
        'country',
        'county',
        'on_whatsapp',
        'whatsapp_number',
        'age',
        'church',
        'in_cr_group',
        'cr_group_name',
        'interested_in_starting_cr_group',
        'willing_to_sponsor',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeSearch($query, $term)
    {
        $term = trim(mb_strtolower($term));

        // Split search into words
        $words = preg_split('/\s+/', $term); // Handles multiple spaces

        return $query->where(function ($query) use ($words) {
            foreach ($words as $word) {
                $query->orWhereRaw('LOWER(full_name) LIKE ?', ["%{$word}%"])
                    ->orWhereRaw('LOWER(phone_number) LIKE ?', ["%{$word}%"])
                    ->orWhereRaw('LOWER(country) LIKE ?', ["%{$word}%"]);
            }
        });
    }
}
