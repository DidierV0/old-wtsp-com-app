<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    // Champs assignables en masse
    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'user_id',
        // autres champs si nécessaire
    ];

    // Relation
    public function listes()
    {
        return $this->belongsToMany(Liste::class, 'liste_contacts', 'id_contact', 'id_liste');
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
