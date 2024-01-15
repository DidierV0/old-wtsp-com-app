<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Champs assignables en masse
    protected $fillable = [
        'nom_message',
        'nom_tamplate',
        'contenue',
        // autres champs si nécessaire
    ];

} 
