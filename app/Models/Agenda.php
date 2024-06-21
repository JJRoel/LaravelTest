<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    // Definieer de tabelnaam als deze afwijkt van de standaard
    protected $table = 'agenda';

    // De velden die massaal toegewezen kunnen worden
    protected $fillable = ['titre', 'details', 'date', 'end_date', 'genre', 'item_id'];

    // Optioneel: definieer datum velden
    protected $dates = ['date'];
}

