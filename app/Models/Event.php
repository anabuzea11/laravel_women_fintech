<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * Atribute permise pentru mass assignment.
     */
    protected $fillable = [
        'name',        // Titlul evenimentului
        'description',  // Descrierea evenimentului
        'event_date',   // Data evenimentului
    ];
}
