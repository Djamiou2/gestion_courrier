<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinataire extends Model
{
    use HasFactory;
    public function courrier() 
    {
        return $this->belongsToMany(Courrier::class);
    }
}
