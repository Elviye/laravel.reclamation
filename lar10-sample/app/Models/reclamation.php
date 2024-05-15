<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'jesuis',
        'typereclam',
        'nom',
        'prenom',
        'cne',
        'email',
        'etablissement',
        'message',
        'status',

    ];
}
