<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_listes extends Model
{
    use HasFactory;

    protected $table = 'contact_listes';

    protected $fillable = [
        'contact_id',
        'listes_id',
        // autres champs si nécessaire
    ];
}
