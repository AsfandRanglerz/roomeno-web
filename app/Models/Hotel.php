<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    // Fillable columns for mass assignment
    protected $fillable = [
        'name',
        'slug',
        'description',
        'images',
        'location',
        'city',
        'country',
        'price',
        'stars',
        'amenities',
        'rating',
        'max_guests',
        'free_cancellation',
        
    ];

    public function bookings()
{
    return $this->hasMany(Booking::class);
}
}
