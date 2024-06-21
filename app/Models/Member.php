<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Definieer de tabelnaam als deze afwijkt van de standaard
    protected $table = 'members';

    // De velden die massaal toegewezen kunnen worden
    protected $fillable = ['login', 'nom', 'prenom', 'email', 'section', 'annif'];

    // Optioneel: definieer datum velden
    protected $dates = ['annif'];
}

