<?php

namespace App\Models;

use App\Models\User;
use App\Models\Contact_listes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listes extends Model
{
    use HasFactory;

        // Nom de la table si différent du nom du modèle au pluriel
        protected $table = 'listes';

        // Champs assignables en masse
        protected $fillable = [
            'nom_liste',
            'description',
            'user_id',
            // autres champs si nécessaire
        ];
    
        // Relation avec Contact
        public function contacts()
        {
            return $this->belongsToMany(Contact::class, 'liste_contacts', 'id_liste', 'id_contact');
        }
        
        public function user(): HasMany
        {
            return $this->hasMany(User::class, 'user_id');
        }

        public function items(): HasMany
        {
            return $this->hasMany(Contact_listes::class, 'contact_id');
        }
}
