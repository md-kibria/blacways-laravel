<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'start_time',
        'end_time',
        'location',
        'organizer',
        'is_public',
        'capacity',
    ];

    // public function getStatusAttribute()
    // {
    //     $now = now();

    //     if ($this->start_time > $now) {
    //         return 'upcoming';
    //     }

    //     if ($this->end_time && $this->end_time < $now) {
    //         return 'ended';
    //     }

    //     if ($this->start_time <= $now && (!$this->end_time || $this->end_time >= $now)) {
    //         return 'ongoing';
    //     }

    //     return 'unknown';
    // }

    public function getStatusAttribute()
    {
        $today = now()->startOfDay(); // Get today's date at 00:00:00

        // Convert string timestamps to Carbon instances for proper comparison
        $startDate = $this->start_time ? Carbon::parse($this->start_time)->startOfDay() : null;
        $endDate = $this->end_time ? Carbon::parse($this->end_time)->startOfDay() : null;

        // Event hasn't started yet (start date is after today)
        if ($startDate && $startDate->gt($today)) {
            return 'upcoming';
        }

        // Event has ended (end date is before today)
        if ($endDate && $endDate->lt($today)) {
            return 'ended';
        }

        // Event is currently ongoing (today is between start and end dates, inclusive)
        if ($startDate && $startDate->lte($today) && (!$endDate || $endDate->gte($today))) {
            return 'ongoing';
        }

        return 'unknown';
    }
}
