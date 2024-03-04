<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    use HasFactory;

    public function imputation()
    {
    return $this->belongsTo(Imputation::class, 'courrier_id');
    }

    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }
}
